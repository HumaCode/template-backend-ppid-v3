import re
import os
import shutil

html_file = r"c:\laragon\www\template-backend-ppid-v3\master-data\admin-pengelola-ppid.html"
css_file = r"c:\laragon\www\template-backend-ppid-v3\asset\css\style.css"

with open(html_file, 'r', encoding='utf-8') as f:
    html = f.read()

with open(css_file, 'r', encoding='utf-8') as f:
    css = f.read()

extract1 = ""
extract2 = ""
extract3 = ""

# FIND BUTTON to MODAL end
start_idx = html.find("/* ============================================================\n       BUTTON  (general)")
end_idx = html.find("/* ============================================================\n       LOGOUT MODAL")
if start_idx != -1 and end_idx != -1:
    extract1 = html[start_idx:end_idx]

# FIND MOBILE CARD LIST end
start_idx2 = html.find("/* ============================================================\n       MOBILE CARD LIST")
end_idx2 = html.find("/* ============================================================\n       FOOTER")
if start_idx2 != -1 and end_idx2 != -1:
    extract2 = html[start_idx2:end_idx2]

# FIND The second and third style blocks
# They are just `<style> ... </style>` but we only need the content.
style2_match = re.search(r'<style>\s*(/\* ============================================================\n   APP SHELL RESPONSIVE[\s\S]*?)</style>', html)
if style2_match:
    extract3 += "\n" + style2_match.group(1).strip() + "\n"

style3_match = re.search(r'<style>\s*(.select2-container--default\s*\.select2-selection--single[\s\S]*?)</style>', html)
if style3_match:
    extract3 += "\n/* ============================================================\n   SELECT 2 CLEAR\n============================================================ */\n" + style3_match.group(1).strip() + "\n"

new_css = css + "\n" + extract1 + "\n" + extract2 + "\n" + extract3

with open(css_file, 'w', encoding='utf-8') as f:
    f.write(new_css)

# Remove all <style> blocks from HTML
new_html = re.sub(r'\s*<style>[\s\S]*?</style>', '', html)

# ADD THE CSS LINK if it's not present
if "asset/css/style.css" not in new_html:
    # insert before </head>
    new_html = re.sub(r'(</head>)', r'  <link rel="stylesheet" href="../asset/css/style.css" />\n  \1', new_html)

with open(html_file, 'w', encoding='utf-8') as f:
    f.write(new_html)

print("SUCCESS")
