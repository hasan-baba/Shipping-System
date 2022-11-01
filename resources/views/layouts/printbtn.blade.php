<button class="btn btn-primary m-0 p-1" style="display: block; float: right;" onclick="printing(this)">Print</button>
<script>
    function printing(btn) {
        btn.style.display = "none";
        window.print();
        btn.style.display = "block";
    }
</script>
