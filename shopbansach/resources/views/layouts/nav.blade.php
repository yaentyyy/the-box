
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/home')}}">Admin <span class="sr-only"></span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link"  href="{{url('/users')}}">Users <span class="sr-only"></span></a>
                </li>
            
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="newDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Quản lý danh mục
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="newDropdown">
                        <li><a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a></li>
                        <li><a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê danh mục</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="newDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Quản lý sách truyện
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="newDropdown">
                        <li><a class="dropdown-item" href="{{route('truyen.create')}}">Thêm sách truyện</a></li>
                        <li><a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê sách truyện</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="newDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Chapter
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="newDropdown">
                        <li><a class="dropdown-item" href="{{route('chapter.create')}}">Thêm chapter</a></li>
                        <li><a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê chapter</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                    </ul>
                </li>
            
            </ul>
            <form class="form-inline my-2 my-lg-0" action ="{{url('tim-kiem')}}" method="GET" style="display: flex; justify-content: flex-end;">
                
                <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa" placeholder="Search" aria-label="Search">
                <!-- <div id="search_ajax"></div> -->
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-left: 10px;">Search</button>
            </form>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
        </div>
    </nav>

     <!-- <script type="text/javascript">
        $('#keywords').keyup(function()
        {
            var keywords = $(this).val();
            
            if(keywords !='' )
                {
                    var_token = $('input[name='_token']').val();
                    $.ajax({
                        url:"{{url('/timkiem-ajax')}}",
                        mehtod:"POST",
                        data:{keywords:keywords, _token:_token},
                        success:function(data){
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);
                        }
                    });
                }
            else{
                $('#search_ajax').fadeOut();
            }
            
        }); -->
</div>