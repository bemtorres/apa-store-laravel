@if (session('success'))
<script>
  Swal.fire({
    icon: "success",
    text: "{{ session('success') }}",
  });
</script>
@endif
@if (session('danger'))
<script>
  Swal.fire({
    icon: "error",
    text: "{{ session('danger') }}",
  });
</script>
@endif
@if (session('error'))
<script>
  Swal.fire({
    icon: "error",
    text: "{{ session('error') }}",
  });
</script>
@endif
@if (session('warning'))
<script>
  Swal.fire({
    icon: "warning",
    text: "{{ session('warning') }}",
  });
</script>
@endif
@if (session('info'))
<script>
  Swal.fire({
    icon: "info",
    text: "{{ session('info') }}",
  });
</script>
@endif

