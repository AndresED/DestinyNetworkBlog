<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    v1.1
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; {{date("Y")}} <a href="www.destiny-networks.com">Destiny Networks</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/app.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<script>
    function setActive()
    {
        c_url = window.location.pathname;
        c_url = window.location.origin + c_url;
        nav_items = document.getElementById('main-nav').getElementsByTagName('a');
        for(i=0; i<nav_items.length;i++)
        {
            if(c_url === nav_items[i].href)
            {
                nav_items[i].parentElement.parentElement.parentElement.className='active';
                nav_items[i].parentElement.className='active';
            }
        }
    }
    window.onload = setActive;
</script>
<script src="{{asset('js/code.js')}}"></script>
@stack('addOwnFooter')
</body>
</html>