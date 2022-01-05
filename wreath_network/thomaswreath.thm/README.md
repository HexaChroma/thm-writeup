<thomaswreath.thm (10.200.107.200:22,80,443,9090,10000)>
------------------------------------------------------------------------------------------
1. Port Scan (nmap -sC -sV -v $IP -oN nmap/init)
```
	22 	 -> OpenSSH 8.0 (protocol 2.0)

	80 	 -> Apache 2.4.37 centos OpenSSL/1.1.1c
			|Methods: Get, Head, Post, Options, Trace

	443  -> thomaswreath.thm
			|OrgName	: Thomas Wreath Development
			|Location	: East Riding Yorkshire

	9090  -> Closed	#zeus-admin, might be false \+

	10000 -> Webmin MiniServ 1.890
```

2. Gobuster (gob -els 200,301,302,307,500 -w raft-small-words.txr -u thomaswreath.thm -x php,txt,html -o dirb/thomaswreath.out)

```
https://thomaswreath.thm/js (Status: 301) [Size: 236]
https://thomaswreath.thm/index.html (Status: 200) [Size: 15383]
https://thomaswreath.thm/css (Status: 301) [Size: 237]
https://thomaswreath.thm/img (Status: 301) [Size: 237]
https://thomaswreath.thm/. (Status: 200) [Size: 15383]
https://thomaswreath.thm/fonts (Status: 301) [Size: 239]
https://thomaswreath.thm/noindex (Status: 301) [Size: 241]
...
```

3. CVE-2019-15107 <this is da WAE>
Searchsploit (serchsploit webmin < 1.890) 
```
[Searchsploit]
Webmin < 1.920 - 'rpc.cgi' Remote Co | linux/webapps/47330.rb

[metasploit]
0  exploit/linux/http/webmin_backdoor  2019-08-10       excellent  Yes    Webmin password_change.cgi Backdoor
```

4. Persistence 
```
copied /root/.ssh/id_rsa
```