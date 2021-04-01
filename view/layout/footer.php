<?php

use App\Service\SubscriptionService;
use App\Service\UserService;

$subscribe = new SubscriptionService();
$user = new UserService();

?>

<footer style="padding: 50px 0 55px">

    <div class="container" style="display:flex; align-items: center">
        <div class="col-md-4 text-center">
            <img src="/view/assets/img/logo.png" alt="" class="center-block img-responsive">
        </div>

        <div class="col-md-4 text-center res-margin">
            <ul class="list-unstyled">
                <li><i class="fa fa-phone"></i>(000) 000-000</li>
                <li><i class="fa fa-envelope"></i>Email: <a href="mailto:your@email.com">site@email.com</a></li>
                <li><i class="fa fa-map-marker"></i>123 Anywhere Street,London,LO4 6ON</li>
            </ul>
        </div>

        <div class="col-md-4 text-center res-margin">
            <form method="post">

                <?php if (isAuthorized()): ?>

                    <input class="form-control topSubscribe" id="email" name="email" type="hidden"
                           placeholder="Email address" value="<?= $user->getActiveEmail() ?>" style="margin-bottom: -10px;">

                <?php else: ?>

                    <input class="form-control topSubscribe" id="email" name="email" type="email"
                           placeholder="Email address">

                <?php endif; ?>

            </form>

            <button class="btn btn-primary" id="subscription" onclick="subscription.sign()">Subscribe</button>
        </div>
    </div>

    <div class="credits col-md-12 text-center">
        Copyright © 2017 - Designed by <a href="http://www.ingridkuhn.com">Ingrid Kuhn</a>
        <div class="page-scroll hidden-sm hidden-xs">
            <a href="#page-top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
        </div>
    </div>

</footer>

<script>
    const isAuth = <?= isAuthorized() ? 1 : 0 ?>;
</script>

<script src="/view/assets/js/jquery.min.js"></script>
<script src="/view/assets/js/bootstrap.min.js"></script>
<script src="/view/assets/js/main.js"></script>
<script src="/view/assets/js/contact.js"></script>
<script src="/view/assets/js/plugins.js"></script>
<script src="/view/assets/js/prefixfree.js"></script>
<script src="/view/assets/js/ajax/user.js"></script>
<script src="/view/assets/js/ajax/subscribe.js"></script>
<script src="/view/assets/js/drag_and_drop.js"></script>

<?php if (isAuthorized() && $subscribe->checkByEmail($user->getActiveEmail())): ?>

    <script>
        updateButton(document.getElementById("subscription"))
    </script>

<?php endif; ?>

</body>

</html>
