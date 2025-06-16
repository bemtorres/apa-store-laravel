<script>
  function fireMessage(type, message) {
    Swal.fire({
      icon: type,
      text: message,
    });
  }

  function swalMessage(type, message) {
    switch (type) {
      case 'success':
        fireMessage('success',message);
        break;
      case 'ok':
        fireMessage('success',message);
        break;
      case 'error':
        fireMessage('danger',message);
        break;
      case 'danger':
        fireMessage('danger',message);
        break;
      case 'warning':
        fireMessage('warning',message);
        break;
      case 'info':
        fireMessage('info',message);
        break;
      default:
        fireMessage('info',message);
        break;
    }
  }
  @if (session('success'))
    swalMessage('success', "{{ session('success') }}");
  @endif
  @if (session('danger') || session('error'))
    swalMessage('error', "{{ session('danger') }}");
  @endif
  @if (session('warning'))
    swalMessage('warning', "{{ session('warning') }}");
  @endif
  @if (session('info'))
    swalMessage('info', "{{ session('info') }}");
  @endif
</script>
