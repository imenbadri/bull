<!-- Footer -->
<footer class="bg-dark text-center text-lg-start fixed-bottom" >
<!-- Copyright -->
<div class="text-center p-3 text-light" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-light" href="#">Bull</a>
</div>
<!-- Copyright -->
</footer>
@foreach (config('bull.public.global.js') as $item)
    <script crossorigin="anonymous" src="{{ $item }}"></script>
@endforeach
</body>

</html>