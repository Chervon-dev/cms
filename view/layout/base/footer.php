<?php

use App\Service\SubscriptionService;
$subscriptionService = new SubscriptionService();

?>

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

<?php if (isAuthorized() && $subscriptionService->checkByEmail(getActiveEmail())): ?>

    <script>
        updateButton(document.getElementById("subscription"))
    </script>

<?php endif; ?>

</body>

</html>
