<footer class="footer">
    © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
</footer>
</div>
</div>

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/view/admin/assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="/view/admin/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/view/admin/assets/js/app-style-switcher.js"></script>
<script src="/view/admin/assets/js/waves.js"></script>
<script src="/view/admin/assets/js/sidebarmenu.js"></script>
<script src="/view/admin/assets/plugins/chartist-js/dist/chartist.min.js"></script>
<script src="/view/admin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<script src="/view/admin/assets/plugins/d3/d3.min.js"></script>
<script src="/view/admin/assets/plugins/c3-master/c3.min.js"></script>
<script src="/view/admin/assets/js/pages/dashboards/dashboard1.js"></script>
<script src="/view/admin/assets/js/custom.js"></script>
<script src="/view/admin/assets/js/ajax/perpage.js"></script>
<script src="/view/admin/assets/js/ajax/delete.js"></script>
<script src="/view/admin/assets/js/ajax/change.js"></script>
<script>

    $('#custom-file-upload').change(function () {
        var value = $("#custom-file-upload").val().split('/').pop().split('\\').pop();
        $('.js-value').text(value);
    });

</script>

</body>

</html>