<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<style>
    .mobile-footer {
        display: none;
        background-color: #004b96;
        color: #ffffff;
        text-align: center;
        padding: 5px 0;
    }

    .mobile-footer i {
        font-size: 25px;
        margin: 0 18px;
        font-weight: bolder;
        color: #ffffff;
    }

    @media (max-width: 769px) {
        .mobile-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            /*height: 7%;*/
            z-index: 1000;
        }
    }
</style>


<footer class="mobile-footer">
    <a href="javascript:history.back()" ><i class="bi bi-arrow-left"></i></a>
{{--    <a href="{{ route('booking.index') }}" ><i class="bi bi-book"></i></a>--}}
{{--    <a href="{{ route('admin.home') }}" ><i class="bi bi-house"></i></a>--}}
{{--    <a href="{{ route('patient.index') }}" ><i class="bi bi-person"></i></a>--}}
    <a href="javascript:history.forward()" ><i class="bi bi-arrow-right"></i></a>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




