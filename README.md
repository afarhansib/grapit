# Grapit

Grapit (graph it) adalah script php sederhana yang berfungsi untuk mengambil data dari Dicoding dan memformatnya dalam bentuk chart.  Berikut adalah penjelasan singkat bagaimana menggunakan script ini.

## Instalasi
Untuk menginstalnya cukup clone project ini, kemudian upload ke sebuah php hosting yang mengizinkan Access-Control-Allow-Origin nya dimodifikasi, contoh web hosting gratis yang sudah saya coba adalah 000webhost.com.

## Setup

### 1. Simpan Cookie Dicoding

Simpan **semua** value dari cookie `laravel_session` di halaman Dicoding anda di bagian awal file `grab-table.php` dan `grab-data.php`.

![Tempat cookie laravel_session](https://lh3.googleusercontent.com/NCTJ4L65MKQj-SZSwFfmSlSu0qYUv0HIZZ2gu0Pl9ODjHGI9KO35gOsU1TYf1df5oyIN69qsKgmLXtfuup5bdqp5A-SyEwCC1HwF0La1tnjC8rdI9gJyNLvsJgXp3i-4pXoiBOd5-1QHebndk6_FKsekyLbv_KALNqzR0MPn5cZDey2GlB9zKrwC4c4YyeBRAgXByRYpKGMDRpy871qWFoNPgxv3lWbl7prLZca2vUBD_NlM3E-rMYeLItoUcmNJSfWH4lJ3-t4bxmkkDsCFsu-fGypM-QRD9zLOmhAjluFyJyYCKwo7U_osT0TyNSr9DonXMsgXO43m66HU7PRoG5bmAtEDzSan_9oLfgSMLkns76qns6M5kKsyy4APQTCoU27oA00QqVwgQuxGvNz8aSN-8JuBxTWI9MHoEBJcz_C35_xxzcp9wz9crjl8AtUHynqAKxjoW6cu9i78dMy-ynqipXYttpy9f_wb5qAX_YK-sjynAF5fHl74JuZ44WwMpYRBpzq1dEnYlqx-seN1fJAvYxAwinmqxTI4VQH634mMYuGcRfHsHam69KxpNfz0mhuroIatjz1y9dtCse8wGGSxREf7iiIT0_erYTKW6Y1nfDE5JKr8nCV1Y5KKKEQxWveKzQWWjnuNMOeTB3H-4G8T7baAheP7foUlMReYmPEt1cRtAaNyRO0DRB8g=w824-h443-no?authuser=0)

### 2. Buat file data.json

File ini akan digunakan untuk menyimpan semua data yang akan diperoleh nantinya. Data dalam file ini berupa timestamp, nama, tokenid, dan progressnya.

Untuk membuat file ini cukup dengan membuka file `grab-table.php` melalui web browser biasa, kemudian pastikan response yang ada di console adalah `berhasil!`. Hiraukan **Warning**-nya.

> **Memanggil file ini akan selalu me-reset file data.json**

![respon di console berupa string berhasil](https://lh3.googleusercontent.com/2mONmdTxbEhUFGKoJWPS4SQHim0dk4uFHpNST1HXL4qRhnVb_lEovD96mBAbJ-CFsnNr-g6CBNrJzeGhToWTycVAooS1N_Z_DKIvkh9JoaLebL3R3jA0Zvmp5k8bc-uOSqLAfzA7TGBZlntsKRfTUPhftVBpFBoQzQgEeSSfUh2jhziBcmYDWNRve3_I_OrRIHhGWOBxyDzz6FxFhki4kJYgqKMjRfUisWPcVS4r-h-G_6RUGIFuLaoEj6Aoywhxxt5G4VArsIXpAl6MfRviYqom6xKfk-fuDwGYRd3AjYvpqhvd_tcWFX5mMCYgB9jX58RXW9W_DXJJlkJsT9Crk68EWOtFlrAGiMYvh-DakivKgohOcGwFpbGeY04Vth5uaYsr60v8Zqz1QjSuo1zqUoxuzZa_mBxsdlgf9XqSrdfq_voOeTixWBFf9xg_LmbaK22lUkafa_X7WWag05dNRxV6zpl1ENeE7yPYdwpQt0xv-MTp0_dVMpDKl-YRRMfRnIhixY88cKsuKHL-wQ_ann5lchJRgAZpvjeR3mWwsZNBkECRG8P7LbK6FDjwcRy61vyFenKwcJqv5F40suszGHdmDyzQhfd65ULoKeKbUo4uIECK31Rpr1n48YzJu8cyoOPG-JPG99oo9Km3Pa2-hos_net19OUeq07-JG4a-l0SR6Yh2-MK6UbDNzOW=w679-h399-no?authuser=0)


Sampai sini seharusnya file data.json anda telah berisi nama dan tokenid peserta.

### 3.  Dapatkan data pertama

Langkah ini bisa untuk mencoba apakah semuanya telah berfungsi dengan semestinya. Caranya hanya dengan memanggil file `grab-data.php` baik melalui browser atau client lainnya, pastikan mendapatkan response berupa string `data saved!`.

Kemudian coba buka halaman index.html, pastikan data pertama sudah tercetak.

### 4. Konfigurasi Cron Job

Langkah ini opsional,  jika Anda mau mendapatkan data secara rutin (misalnya setiap hari sekali) maka lakukan langkah ini.

Untuk mengonfigurasi cron job anda bisa menggunakan cron job bawaan hosting, atau menggunakan layanan cron job eksternal.

Saya sendiri menggunakan layanan dari cron-job.org karena pengaturan waktunya lebih fleksibel daripada cron job bawaan hosting saya (000webhost) 

![contoh cron job saya](https://lh3.googleusercontent.com/SXaOVXTP5xLevVRzrB2w4Kr0JLTldkoT9ndDSM2tL5SvZ7BdtiwGNz-45Lw6mISJhx9LuLz5OQFun7p7hlyb0O7VDdDQNPdVig4VwfEVY8Z6ZupgFG-T1FMAKUyt_u2LvrUkqoOiCQ8S0d0smSvr0k8a8UB0fIm8mXNILm6MeDz-csdNIv96EK-3sMSMxhYnnrpRmZ7F5GWgya8vuSs2HmdJopYuERqvOEcNvcYikyhdyUbvhATYKHLuR13QLv1BZX6el4dyr1PGuaKG7ArZEuWgxJu1tp7iUtBuX2Muv1yz9NufMsbTbnsW1yfZDTA5sjJxGp98c9b_F_P5HU0KQqBWhrIdfFsM6XvUnkjVyXfLqnjcxERGYocm1c9wQHzSbRasRCi9QK-vYMAATL_03-GxF7hCM3qQtIEkfUvmVpqJZrHvJp456IgY7a0N-ZU3n2l_69A6rFJ1_cBEGy2ffNIy8l7RlbBb9LjbkKda12tiXPjQDYtWzVIHg21micoIpTlpb-f-BzhVrxbTuZzrOBmM0O7_TsHSZDYY487PDMBeNfMRpuMEKU8TsFeoJpCtFZ7r_i3JiGSWkxHbMSvXQGFHdILt-MEzkFowoPps-EImq71MwUPxJbPFvGIr18oIn-3hANi--pNEfv6o3sPKX3ZxxnW3cyt7yljBlz5P0EUF_TqqDceA4CCP8h5k=w820-h632-no?authuser=0)

Saya rasa itu sudah semua. Terima kasih.