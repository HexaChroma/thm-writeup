pentest report layout
-------------------------------------------
1. Quick recap on Apache SOLR LOG4J vulnerability

- introducing log4shell
```
Dec 9th, 2021, emerged a new 'shellshock' like vulnerability dubbed as "log4shell" 
which affected million of devices using java worldwide. The logging feature log4j 
gives RCE to adversaries by resolving ldap lookup through JNDI and is scored 10.0 
(the most critical designation) based on CVSS.
```
\*CVSS (Common Vulnerability Scoring System)

- affected versions
```
Severity: Critical

Versions Affected: 7.4.0 to 7.7.3, 8.0.0 to 8.11.0
solr 5, solr6 , solr7 - solr7.3 all of these uses log4j 1.12.7 
```
\*Based on `https://solr.apache.org/security.html#apache-solr-affected-by-apache-log4j-cve-2021-44228`

- mitigation
```
- upgrade to solr 8.11.1 or greater (uses log4j 2.16.0) [CVE2021-45105 said theres DOS vulnerability here]. you might want to upgrade log4j manually to 2.17.1
- hotfix for those who uses EOL versions:
	> [linux] 	in /etc/default/solr.in.sh insert "SOLR_OPTS="$SOLR_OPTS -Dlog4j2.formatMsgNoLookups=true" in EOF
	> [windows]	in solr.in.cmd insert "set SOLR_OPTS=%SOLR_OPTS% -Dlog4j2.formatMsgNoLookups=true" in EOF
```
mitigation src: https://solr.apache.org/security.html#apache-solr-affected-by-apache-log4j-cve-2021-44228


- lesson learnt
```
- log4j 1.x is EOL 6 years ago on Aug 5, 2015.
- back in 2016 this vulnerability already been discussed on blackhat conference https://www.blackhat.com/docs/us-16/materials/us-16-Munoz-A-Journey-From-JNDI-LDAP-Manipulation-To-RCE.pdf
```

2. POC
```
the easiest and oversimplification version is available at tryhackme https://tryhackme.com/room/solar

to really pull it off on real world you might need to chain the exploit https://www.youtube.com/watch?v=dPEsjj3eONU


```

3. Exploitation (THM solr sample)
```
1. reconnaissance
![nmap.png](nmap.png)

2. view the log file given on task x
solr.logs.zip

3. 	
```
