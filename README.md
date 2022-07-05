## Welcome To Siport Sitem Perjalanan Online

Berikut Cara Installasi Siport
1. Clone File Siport 
> $ git clone https://github.com/ipsmerdek4/siport.git

2. setelah clone open file siport 
> cd /siport

3. update sistem siport 
> $ composer update

4. install thema stisla di cd /siport/public/stisla
> open website https://github.com/stisla/stisla ikuti instruksi installasi

5. setting vhost, jika menggunakan xampp
> open file lokasi C:\xampp\apache\conf\extra\httpd-vhosts.conf
<br><br>
<VirtualHost siport.local&#58;80> <br>
&#32;&#32;&#32;ServerName siport.local <br>
&#32;&#32;&#32;ServerAlias siport.local <br>
&#32;&#32;&#32;DocumentRoot "C:/xampp/htdocs/siport/public" <br>
&#32;&#32;&#32;<Directory "C:/xampp/htdocs/siport/public"> <br>
&#32;&#32;&#32;&#32;&#32;Options Indexes FollowSymLinks MultiViews <br>
&#32;&#32;&#32;&#32;&#32;AllowOverride All<br>
&#32;&#32;&#32;&#32;&#32;Require all granted <br>
&#32;&#32;&#32;<&#47;Directory> <br>
<&#47;VirtualHost> <br>

6. Enable # HOST
> location : C:/Windows/System32/drivers/etc/hosts <br>
> add <br>
> 127.0.0.1 siport.local

7. setting php.ini
> extension=gd <br>
> extension=intl<br>
> extension=curl<br>
> hilangkan semua titikkoma (;) di awal huruf untuk mengaktifkan


7. Add env dan tambahkan database
> $ cp env .env

8. jalankan migrasi
> $ php spark migrate

9. jalankan seed
> $ php spark db:seed runsemua

10. finish jalankan sistem dengan username dan password default : admin2022 pada alamat : http://siport.local



## Perangkat pendukung :

1. Composer
2. git
3. CodeIgniter 4
4. thema Stisla
5. xampp php 8^


