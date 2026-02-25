import re
import os

html_file = r"c:\laragon\www\template-backend-ppid-v3\master-data\admin-pengelola-ppid.html"
css_file = r"c:\laragon\www\template-backend-ppid-v3\asset\css\style.css"

with open(html_file, 'r', encoding='utf-8') as f:
    html = f.read()

with open(css_file, 'r', encoding='utf-8') as f:
    css = f.read()

# Extract the entire content of each style tag
style_tags = re.findall(r'<style>([\s\S]*?)</style>', html)
if not style_tags:
    print("No <style> tags found in HTML")
    exit()

all_css_from_html = "\n".join(style_tags)

# To find missing classes reliably, we can use a crude parser that looks for selectors
def get_rules(css_text):
    # Removes comments
    css_text = re.sub(r'/\*[\s\S]*?\*/', '', css_text)
    
    # We will just roughly extract everything of the form:
    # selector { block }
    # Let's use a simple brace matching state machine
    rules = {}
    current_selector = ""
    current_block = ""
    depth = 0
    in_block = False
    
    i = 0
    while i < len(css_text):
        c = css_text[i]
        if c == '{':
            if depth == 0:
                in_block = True
            else:
                current_block += c
            depth += 1
        elif c == '}':
            depth -= 1
            if depth == 0:
                in_block = False
                sel = current_selector.strip()
                # Ignore media queries for this simple check
                if sel and not sel.startswith('@'):
                    # Split grouped selectors
                    for s in sel.split(','):
                        s = s.strip()
                        if s:
                            rules[s] = current_block.strip()
                elif sel and sel.startswith('@'):
                    # if it's a media block, we just ignore adding its nested rules for now, 
                    # actually it's better to just extract the raw blocks we know are missing.
                    pass 
                current_selector = ""
                current_block = ""
            else:
                current_block += c
        else:
            if in_block:
                current_block += c
            else:
                current_selector += c
        i += 1
    return rules

css_rules = get_rules(css)
html_rules = get_rules(all_css_from_html)

missing_selectors = set(html_rules.keys()) - set(css_rules.keys())

# Re-extract the original blocks that contain these missing selectors (with comments)
# It's better to just append the whole CSS text of missing selectors as new rules.
new_css = "\n/* --- ADDED FROM ADMIN PENGELOLA PAGE --- */\n"
for sel in missing_selectors:
    new_css += f"{sel} {{\n  {html_rules[sel]}\n}}\n"

# But what about @media blocks?
# Let's extract all media blocks from HTML
media_blocks = re.findall(r'(@media[^{]+\{([\s\S]+?)\n\})', all_css_from_html)
# Actually, media queries have nested braces. E.g. @media (...) { .a { ... } .b { ... } }
# It's better to use regex to find matching braces.
def extract_media(text):
    res = []
    for match in re.finditer(r'@media[^{]+', text):
        start = match.end()
        # find the '{'
        try:
            brace_start = text.index('{', start)
        except ValueError:
            continue
        depth = 1
        i = brace_start + 1
        while i < len(text) and depth > 0:
            if text[i] == '{': depth += 1
            elif text[i] == '}': depth -= 1
            i += 1
        if depth == 0:
            res.append(text[match.start():i])
    return res

media_blocks_html = extract_media(all_css_from_html)
media_blocks_css = extract_media(css)

for mb in media_blocks_html:
    if mb not in css:
        new_css += "\n" + mb + "\n"

# Now append to style.css
with open(css_file, 'a', encoding='utf-8') as f:
    f.write(new_css)

# Remove all <style> blocks from html
new_html = re.sub(r'\s*<style>[\s\S]*?</style>', '', html)
# Insert the link tag if not present
if "asset/css/style.css" not in new_html:
    new_html = new_html.replace('</title>', '</title>\n    <link rel="stylesheet" href="../asset/css/style.css" />')

with open(html_file, 'w', encoding='utf-8') as f:
    f.write(new_html)

print("Done")
