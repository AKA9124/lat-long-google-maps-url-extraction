import re
import requests

text = "Mc Donald's https://goo.gl/maps/4ibdvwWDF7HWmXcSA"
match = re.findall('http[s]?://(?:[a-zA-Z]|[0-9]|[$-_@.&+]|[!*\(\),]|(?:%[0-9a-fA-F][0-9a-fA-F]))+', text)
hasil_link = "|".join(match)
res = requests.head(hasil_link, allow_redirects=True)
link_baru = res.url
matches = re.search("@(.*?),(.*?),", link_baru)
place = matches.group(0)
lat = matches.group(1)
long = matches.group(2)

print("Before: " + text)
print("After Selection: " + hasil_link)
print("After Page Visit: " + link_baru)
print("Array: " + str(matches.groups()))
print("Place: " + place)
print("Latitude: " + lat)
print("Longitude: " + long)
