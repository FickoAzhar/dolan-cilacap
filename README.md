Dolan Cilacap

Aplikasi dibuat menggunakan Framework Laravel, Tailwind CSS, Laravel Highcharts

1. Langkah menjalankan file
   - Install composer
   - ganti file .env.example menjadi .env
   - buat database yang memiliki nama yang sama seperti di file .env
   - jalankan perintah: php artisan key:generate
   - jalankan perintah: php artisan migrate:fresh --seed
   - jalankan perintah: php artisan serve

2. heirarki folder
   - Model dan Controller terletak pada folder app - Http
   - file migration dan seeder terdapat pada folder database
   - Halaman Views terletak pada resources
   - router terletak pada web.php di dalam folder routes
   - semua media terletak di folder public

3. akun & password
   - User Admin
     email    : admin@admin.com
     password : 1234
   - User Guest
     email     : user@gmail.com
     password  : 1234
     atau bisa melakukan registrasi sendiri
                                                             
4. Proses Penggunaan Web                                   
   a. Proses (Pengunjung)                                      
      - untuk membeli tiket pengunjung login terlebih dahulu   
      - Klik menu login dan daftar akun, kemudian login untuk  
        masuk                                                  
      - Pilih Menu Wisata untuk membeli tiket klik beli     tiket                                                    
   b. (Admin)                                                  
      - Klik menu login untuk masuk ke dashboard admin         
      - Admin dapat mengelola destinasi, user dan melihat data endapatan

