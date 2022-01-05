#!/usr/bin/env python3
import pyfiglet
import sys,socket
from datetime import datetime

ascii_banner = pyfiglet.figlet_format("Port Scanner")
print(ascii_banner)

target=socket.gethostbyname(sys.argv[1])
print("-"*50)
print("Scanning Target: " + target)
print("Started at: " + str(datetime.now()))
print(".-"*25)

try:
    for port in range(1,65535):
        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        socket.setdefaulttimeout(1)
        result = s.connect_ex((target,port))
        # answer = s.recv(1024)
        if result == 0:
            print("Port {} is open".format(port))
        s.close()

except KeyboardInterrupt:
    print("\n Exiting Program..")
    sys.exit()
except socket.gaierror:
    print("\n Hostname Could not be resolved!")
    sys.exit()
except socket.error:
    print("\n Server not responding :(")
    sys.exit()

