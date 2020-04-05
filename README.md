## SNMP Manger
main files can be found in 
- App/HTTP/Controllers/SnmpController
- resources/views/

for demo please visit [snmp2.bishtawi.me](snmp2.bishtawi.me)

## notes
- not all tables work on the remote server since it's an ubunto server (it seem it has diffrent OID ) but if you pull the repo and run it localy it will work fine 
- to run the code localy
```bash
git clone https://github.com/OmarBish/snmp-hw
cd snmp-hw
## you need to have composer installed on your machine
cp .env.example .env
composer install 
php artisan key:generate
php artisan migrate
php artisan serv
```
then you can access the server at the url shown to you in the command 
