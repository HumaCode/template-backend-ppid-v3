import cssutils
import logging
import re

cssutils.log.setLevel(logging.CRITICAL)

html_file = r"c:\laragon\www\template-backend-ppid-v3\master-data\admin-pengelola-ppid.html"
css_file = r"c:\laragon\www\template-backend-ppid-v3\asset\css\style.css"

with open(html_file, 'r', encoding='utf-8') as f:
    html = f.read()

with open(css_file, 'r', encoding='utf-8') as f:
    css = f.read()

style_tags = re.findall(r'<style>([\s\S]*?)</style>', html)
all_html_css = "\n".join(style_tags)

sheet_css = cssutils.parseString(css)
sheet_html = cssutils.parseString(all_html_css)

existing_selectors = set()
existing_media_selectors = {}

# Parse existing CSS properties
for rule in sheet_css:
    if rule.type == rule.STYLE_RULE:
        # Many rules can be grouped like .a, .b -> split them?
        existing_selectors.add(rule.selectorText.strip())
    elif rule.type == rule.MEDIA_RULE:
        media_text = rule.media.mediaText.strip()
        if media_text not in existing_media_selectors:
            existing_media_selectors[media_text] = set()
        for subrule in rule.cssRules:
            if subrule.type == subrule.STYLE_RULE:
                existing_media_selectors[media_text].add(subrule.selectorText.strip())

new_sheet = cssutils.css.CSSStyleSheet()

for rule in sheet_html:
    if rule.type == rule.STYLE_RULE:
        sel = rule.selectorText.strip()
        if sel not in existing_selectors:
            # We also check if all its parsed selectors are in existing_selectors individually
            new_sheet.add(rule)
    elif rule.type == rule.MEDIA_RULE:
        media_text = rule.media.mediaText.strip()
        new_media_rule = cssutils.css.CSSMediaRule(media_text)
        added_any = False
        
        for subrule in rule.cssRules:
            if subrule.type == subrule.STYLE_RULE:
                sel = subrule.selectorText.strip()
                if media_text not in existing_media_selectors or sel not in existing_media_selectors[media_text]:
                    new_media_rule.add(subrule)
                    added_any = True
        
        if added_any:
            new_sheet.add(new_media_rule)

added_css_text = new_sheet.cssText.decode('utf-8')

with open(css_file, 'a', encoding='utf-8') as f:
    f.write("\n/* --- ADDED DYNAMICALLY FROM ADMIN PAGE --- */\n")
    f.write(added_css_text)

new_html = re.sub(r'\s*<style>[\s\S]*?</style>', '', html)
if "asset/css/style.css" not in new_html:
    new_html = re.sub(r'(</head>)', r'  <link rel="stylesheet" href="../asset/css/style.css" />\n  \1', new_html)

with open(html_file, 'w', encoding='utf-8') as f:
    f.write(new_html)

print("SUCCESS")
