from urllib import request
url = "https://mbasic.facebook.com/10000"
html = request.urlopen(url).read().decode('utf8')
html[:60]

from bs4 import BeautifulSoup
soup = BeautifulSoup(html, 'html.parser')
title = soup.find('title')

print(title) # Prints the tag
print(title.string) # Prints the tag 

