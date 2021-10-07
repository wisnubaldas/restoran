## Restoran
### Install
- Clone repo `` git clone https://github.com/wisnubaldas/restoran.git ``
- Jalankan perintah 
	```bash
	composer install
	npm install
	```
- Bikin koneksi 
	```bash
	cp .env.example .env
	```
- Bikin seed data sample
	```bash
	php artisan migrate --seed
	php artisan optimize
	```
- Jalankan server
	```bash
	php artisan serve
	```
## Answer
> Aplikasi Survey Produk Baru Keramik
- Petugas survey membuat survey produk baru
- Data survey ditampilkan di depo-depo untuk di proses
- Depo melakukan survey produk baru ke toko-toko 
- Data hasil survey dari toko-toko diinput oleh Depo di aplikasi survey
- Petugas survey merekap data-data survey untuk laporan survey produk baru

> Bahasa yang digunakan PHP, Javascript dan CSS 

> Framework yang digunakan Laravel sebagai backend,
> dan Vue Js sebagai frontend nya

> Proses devlopment nya masih menggunakan metode waterfall, (mengumpulkan data, interview client dan membuat flowchart activity diagram, class diagram, use case diagram)