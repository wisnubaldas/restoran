## Restoran
### Screen Shoot
![jenis_makanan](https://user-images.githubusercontent.com/10908214/136309768-8302d751-f07c-4b86-b50a-62cdd39e819a.png)
![menu](https://user-images.githubusercontent.com/10908214/136309794-953ec4b7-4315-4648-8854-7b0b6ea5f53d.png)


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
- User dan Password login
	Administrator
	```bash
	email: admin@admin.com
	pass: password
	```
	Kasir
	```bash
	email: kasir@kasir.com
	pass: password
	```
	Pelayan
	```bash
	email: pelayan@pelayan.com
	pass: password
	```
- Api End point
	```bash
	/api/login
	/api/all_product
	```
    ![Jepretan Layar 2021-10-10 pukul 21 45 50](https://user-images.githubusercontent.com/10908214/136701475-a8a859b6-0ca1-4d08-acbc-3bb4aea47ed4.png)
    ![Jepretan Layar 2021-10-10 pukul 21 58 24](https://user-images.githubusercontent.com/10908214/136701484-dbbd81b1-ad14-43e8-ad89-6107553bb75f.png)

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
