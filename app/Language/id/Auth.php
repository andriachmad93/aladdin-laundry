<?php

return [
    // Exceptions
    'invalidModel'              => 'Model {0} harus terload sebelum digunakan.',
    'userNotFound'              => 'Tidak dapat menemukan user dengan ID = {0, number}.',
    'noUserEntity'              => 'User Entity harus memiliki validasi password.',
    'tooManyCredentials'        => 'Anda hanya dapat memvalidasi 1 credential lain selain password.',
    'invalidFields'             => 'Field "{0}" tidak dapat digunakan untuk memvalidasi credentials.',
    'unsetPasswordLength'       => 'Anda harus menset `minimumPasswordLength` di file Auth config.',
    'unknownError'              => 'Mohon maaf, ada masalah ketika mengirimkan email. Silahkan coba kembali.',
    'notLoggedIn'               => 'Anda harus masuk sebelum mengakses halaman ini.',
    'notEnoughPrivilege'        => 'Anda tidak memiliki izin untuk mengakses halaman ini.',

    // Registration
    'registerDisabled'          => 'Mohon maaf, tidak bisa mendaftar akun baru untuk saat ini.',
    'registerSuccess'           => 'Selamat datang! Silahkan login menggunakan username dan password Anda.',
    'registerCLI'               => 'User baru berhasil dibuat: {0}, #{1}',

    // Activation
    'activationNoUser'          => 'Tidak dapat menemukan user dengan kode aktivasi tersebut.',
    'activationSubject'         => 'Aktifkan akun Anda',
    'activationSuccess'         => 'Silahkan konfirmasi akun Anda dengan mengklik link aktivasi yang sudah kami kirimkan ke email Anda.',
    'activationResend'          => 'Kirim email aktivasi sekali lagi.',
    'notActivated'              => 'Akun ini belum diaktifkan.',
    'errorSendingActivation'    => 'Gagal mengirim email aktivasi ke: {0}',

    // Login
    'badAttempt'                => 'Tidak dapat masuk. Periksa kembali akun Anda.',
    'loginSuccess'              => 'Selamat datang kembali!',
    'invalidPassword'           => 'Tidak dapat masuk. Periksa kembali password Anda.',

    // Forgotten Passwords
    'forgotDisabled'            => 'Opsi untuk mereset password dinon-aktifkan.',
    'forgotNoUser'              => 'Tidak dapat menemukan user dengan email tersebut.',
    'forgotSubject'             => 'Instruksi Reset Password',
    'resetSuccess'              => 'Password Anda sudah berhasil diubah. Silahkan masuk dengan menggunakan password baru.',
    'forgotEmailSent'           => 'Security token sudah dikirimkan ke email Anda. Masukkan ke dalam box di bawah untuk melanjutkan.',
    'errorEmailSent'            => 'Tidak dapat mengirim email untuk reset password ke: {0}',

    // Passwords
    'errorPasswordLength'       => 'Panjang password minimal {0, number} karakter.',
    'suggestPasswordLength'     => 'Panjang pass phrases sampai dengan 255 karakter - buatlah password yang aman dan mudah diingat.',
    'errorPasswordCommon'       => 'Password tidak boleh umum.',
    'suggestPasswordCommon'     => 'Password sudah dicek ke lebih 65 ribu password yang umum digunakan atau password yang sudah terkena hack.',
    'errorPasswordPersonal'     => 'Passwords tidak dapat mengandung informasi personal yang di-hash ulang.',
    'suggestPasswordPersonal'   => 'Variasi dari alamat email Anda dan username tidak boleh digunakan sebagai password.',
    'errorPasswordTooSimilar'    => 'Password mirip dengan username.',
    'suggestPasswordTooSimilar'  => 'Jangan menggunakan username sebagai bagian dari password Anda.',
    'errorPasswordPwned'        => 'Password {0} sudah terekspos karena kebocoran data dan telah dilihat {1, number} kali dalam {2} password yang telah di-hack.',
    'suggestPasswordPwned'      => '{0} tidak boleh digunakan sebagai password. Jika Anda menggunakannya, segera ubah password Anda.',
    'errorPasswordEmpty'        => 'Masukkan password.',
    'passwordChangeSuccess'     => 'Password berhasil diubah',
    'userDoesNotExist'          => 'Password tidak berubah. Akun tidak ditemukan',
    'resetTokenExpired'         => 'Mohon maaf, reset token Anda sudah tidak dapat digunakan.',

    // Groups
    'groupNotFound'             => 'Tidak bisa menemukan group: {0}.',

    // Permissions
    'permissionNotFound'        => 'Tidak bisa menemukan permission: {0}',

    // Banned
    'userIsBanned'              => 'Akun anda diblokir. Hubungi customer service kami',

    // Too many requests
    'tooManyRequests'           => 'Terlalu banyak permintaan. Mohon tunggu {0, number} detik.',

    // Login views
    'home'                      => 'Beranda',
    'current'                   => 'Saat ini',
    'forgotPassword'            => 'Lupa Password?',
    'enterEmailForInstructions' => 'Tidak masalah! Masukkan email Anda dan kami akan mengirimkan instruksi untuk me-reset password Anda.',
    'email'                     => 'Email',
    'emailAddress'              => 'Alamat Email',
    'sendInstructions'          => 'Kirim instruksi',
    'loginTitle'                => 'Masuk',
    'loginAction'               => 'Masuk',
    'rememberMe'                => 'Ingat saya',
    'needAnAccount'             => 'Daftar baru?',
    'forgotYourPassword'        => 'Lupa password?',
    'password'                  => 'Password',
    'repeatPassword'            => 'Ulangi Password',
    'emailOrUsername'           => 'Email atau username',
    'username'                  => 'Username',
    'register'                  => 'Daftar baru',
    'signIn'                    => 'Masuk',
    'alreadyRegistered'         => 'Sudah terdaftar?',
    'weNeverShare'              => 'Kami tidak akan pernah membagikan email Anda dengan orang lain.',
    'resetYourPassword'         => 'Reset Password Anda',
    'enterCodeEmailPassword'    => 'Masukkan kode yang Anda terima melalui email, alamat email Anda, dan password baru Anda.',
    'token'                     => 'Token',
    'newPassword'               => 'Password Baru',
    'newPasswordRepeat'         => 'Ulangi Password Baru',
    'resetPassword'             => 'Reset Password',
    'firstname'                 => 'Nama depan',
    'lastname'                  => 'Nama belakang',
    'phone'                     => 'Nomor handphone',
    'date_of_birth'             => 'Tanggal lahir',
    'gender'                    => 'Jenis kelamin',
];
