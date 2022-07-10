<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/assets_landing/img/LogoPemweb.png') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?= $title; ?></title>

    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
</head>
<body>
    <section class="gradient-form" style="background-color: #eee;">
        <div class="container py-0 py-sm-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                <a href="<?= base_url('') ?>" class="mb-0 mt-2" style="font-size: 15px; text-decoration: none;"><u>Back</u></a>
                                    <div class="text-center">
                                        <img src="<?= base_url('assets/assets_landing/img/LogoPemweb.png') ?>" style="width: 185px;" alt="logo">
                                    </div>
                                    <div class="text-center mt-3"><p><b>Please Register Your Account</b></p></div>
                                    <div class="card p-3 ">
                                    <form method="POST" action="<?= base_url('index.php/auth/registrasi') ?>">
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?= set_value('username'); ?>"/>
                                            <span class="text-danger small"><?= form_error('username') ?></span>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>"/>
                                            <span class="text-danger small"><?= form_error('email') ?></span>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" />
                                            <span class="text-danger small"><?= form_error('password') ?></span>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="cpassword">Confirm Password</label>
                                            <input type="password" id="cpassword" class="form-control" name="cpassword" placeholder="Confirm Password" />
                                            <span class="text-danger small"><?= form_error('cpassword') ?></span>
                                        </div>

                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2">Register</button>
                                            <a href="<?= base_url('index.php/auth') ?>" class="mb-0 mt-2" style="font-size: 15px; text-decoration: none;">Already Have an Account? Sign In Here!!</a>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">EO stands for Event Organizer which in Indonesian means event organizer. Literally, EO is a party or professional service provider that regulates the continuity of an event. 
                                    We have received hundreds of awards too! Making AR EO a trusted & reliable provider of Event Organizer services for the public in Indonesia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>