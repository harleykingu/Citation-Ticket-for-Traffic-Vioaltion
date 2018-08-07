<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/style.js') }}"></script>

<script type="text/javascript">
  $( document ).ready(function(){
    
    $('#myTab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });

  });
</script>
