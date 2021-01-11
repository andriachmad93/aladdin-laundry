<?php

return [
    // Exceptions
    'invalidModel'              => 'The {0} model must be loaded prior to use.',
    'userNotFound'              => 'Unable to locate a user with ID = {0, number}.',
    'noUserEntity'              => 'User Entity must be provided for password validation.',
    'tooManyCredentials'        => 'You may only validate against 1 credential other than a password.',
    'invalidFields'             => 'The "{0}" field cannot be used to validate credentials.',
    'unsetPasswordLength'       => 'You must set the `minimumPasswordLength` setting in the Auth config file.',
    'unknownError'              => 'Sorry, we encountered an issue sending the email to you. Please try again later.',
    'notLoggedIn'               => 'You must be logged in to access that page.',
    'notEnoughPrivilege'        => 'You do not have sufficient permissions to access that page.',

    // Registration
    'registerDisabled'          => 'Mohon maaf, tidak bisa mendaftar akun baru untuk saat ini.',
    'registerSuccess'           => 'Selamat datang! Silahkan login menggunakan username dan password Anda.',
    'registerCLI'               => 'User baru berhasil dibuat: {0}, #{1}',

    // Activation
    'activationNoUser'          => 'Unable to locate a user with that activation code.',
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
    'forgotDisabled'            => 'Resseting password option has been disabled.',
    'forgotNoUser'              => 'Unable to locate a user with that email.',
    'forgotSubject'             => 'Password Reset Instructions',
    'resetSuccess'              => 'Your password has been successfully changed. Please login with the new password.',
    'forgotEmailSent'           => 'A security token has been emailed to you. Enter it in the box below to continue.',
    'errorEmailSent'            => 'Unable to send email with password reset instructions to: {0}',

    // Passwords
    'errorPasswordLength'       => 'Passwords must be at least {0, number} characters long.',
    'suggestPasswordLength'     => 'Pass phrases - up to 255 characters long - make more secure passwords that are easy to remember.',
    'errorPasswordCommon'       => 'Password must not be a common password.',
    'suggestPasswordCommon'     => 'The password was checked against over 65k commonly used passwords or passwords that have been leaked through hacks.',
    'errorPasswordPersonal'     => 'Passwords cannot contain re-hashed personal information.',
    'suggestPasswordPersonal'   => 'Variations on your email address or username should not be used for passwords.',
    'errorPasswordTooSimilar'    => 'Password is too similar to the username.',
    'suggestPasswordTooSimilar'  => 'Do not use parts of your username in your password.',
    'errorPasswordPwned'        => 'The password {0} has been exposed due to a data breach and has been seen {1, number} times in {2} of compromised passwords.',
    'suggestPasswordPwned'      => '{0} should never be used as a password. If you are using it anywhere change it immediately.',
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
    'lastname'                 => 'Nama belakang',
    'phone'                 => 'Nomor telepon',
];
