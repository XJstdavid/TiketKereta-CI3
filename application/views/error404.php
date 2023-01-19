 <!DOCTYPE html>
 <html lang="en">

 <head>
   <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

   <style>
     body {
       background-color: #95c2de;
     }

     .mainbox {
       background-color: #95c2de;
       margin: auto;
       height: 600px;
       width: 600px;
       position: relative;
     }

     .err {
       color: #ffffff;
       font-family: 'Nunito Sans', sans-serif;
       font-size: 11rem;
       position: absolute;
       left: 20%;
       top: 8%;
     }

     .far {
       position: absolute;
       font-size: 8.5rem;
       left: 42%;
       top: 15%;
       color: #ffffff;
     }

     .err2 {
       color: #ffffff;
       font-family: 'Nunito Sans', sans-serif;
       font-size: 11rem;
       position: absolute;
       left: 68%;
       top: 8%;
     }

     .msg {
       text-align: center;
       font-family: 'Nunito Sans', sans-serif;
       font-size: 1.6rem;
       position: absolute;
       left: 16%;
       top: 45%;
       width: 75%;
     }

     a {
       text-decoration: none;
       color: white;
     }

     a:hover {
       text-decoration: underline;
     }
   </style>

 </head>

 <body>
   <div class="mainbox">
     <div class="err">4</div>
     <i class="far fa-question-circle fa-spin"></i>
     <div class="err2">4</div>
     <div class="msg">Halaman Tidak Ditemukan<p>Kembali Ke <a href="<?= base_url() ?>" class="btn btn-light text-decoration-none">Beranda</a></p>
     </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

 </body>

 </html>