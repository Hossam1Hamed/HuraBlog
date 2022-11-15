<script src="{{ URL::asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/multistep-form.js')}}"></script>

<script src="{{ URL::asset('assets/js/plugins/dragula/dragula.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/jkanban/jkanban.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/threejs.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/orbit-controls.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/choices.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/soft-ui-dashboard.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/soft-ui-dashboard.js') }}"></script>
<script src="{{ URL::asset('assets/js/soft-ui-dashboard.js.map') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


<script>
    $("document").ready(function() {
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
    });
</script>

<script>
    var token = "{{Session::token()}}";
    $(".like").on('click',function(){
        var post_id = $(this).attr('data-postid');
        var like_st = $(this).attr('data-like_s');
        var likes_count = $(this).attr('$likes_count');
        
        $.ajax({
            type : 'post',
            url : "{{ route('website.posts.like') }}",
            data : {like_s:like_st , post_id:post_id , _token:token},

            success : function(data){
                if(data.is_like == 1)
                {
                    $('*[data-postid="'+post_id +'"]').removeClass('btn-secondary').addClass('btn-success');
                    likes_count = likes_count + 1;
                }
                if(data.is_like == 0)
                {
                    $('*[data-postid="'+post_id +'"]').removeClass('btn-success').addClass('btn-secondary');
                    likes_count = likes_count - 1;
                }
                
            }
        });
    });
</script>



@vite(['resources/js/app.js'])


@stack('scripts')