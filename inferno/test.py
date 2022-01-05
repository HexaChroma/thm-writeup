#!/usr/bin/env python3
import socket
import sys
from pyfiglet import Figlet
s = socket.socket()

def logo():
    f = Figlet(font='slant')
    print(f.renderText('H E X A' + '\n' + 'C H R O M A'))
    print('--------------Banner Grabber 1.0----------------')

def banner(ip,port):
    s.connect((ip, int(port)))
    print(s.recv(1024))
    return

def main():
    logo()
    ip = sys.argv[1]
    ports = open('a.out').read().split('\n')
    for port in ports:
        banner(ip,port)
try:
    main()
except IndexError:
    sys.exit()
except KeyboardInterrupt:
    sys.exit('\nbye :3')
