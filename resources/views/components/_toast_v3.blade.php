<script>
  iziToast.settings({
    timeout: 3000,
    resetOnHover: true,
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
    position: 'topRight',
    messageColor: 'white',
  });

  function toastSuccess(message) {
    iziToast.success({
      backgroundColor: '#47c363',
      message: message
    });
  }

  function toastError(message) {
    iziToast.error({
      timeout: 0,
      backgroundColor: '#fc544b',
      message: message
    });
  }

  function toastWarning(message) {
    iziToast.warning({
      backgroundColor: '#ffa426',
      message: message
    });
  }

  function toastInfo(message) {
    iziToast.info({
      backgroundColor: '#3abaf4',
      message: message
    });
  }

  function toastMessage(type, message) {
    switch (type) {
      case 'success':
        toastSuccess(message);
        break;
      case 'ok':
        toastSuccess(message);
        break;
      case 'error':
        toastError(message);
        break;
      case 'danger':
        toastError(message);
        break;
      case 'warning':
        toastWarning(message);
        break;
      case 'info':
        toastInfo(message);
        break;
      default:
        toastInfo(message);
        break;
    }
  }
  @if (session('success'))
    toastMessage('success', "{{ session('success') }}");
  @endif
  @if (session('danger'))
    toastMessage('error', "{{ session('danger') }}");
  @endif
  @if (session('warning'))
    toastMessage('warning', "{{ session('warning') }}");
  @endif
  @if (session('info'))
    toastMessage('info', "{{ session('info') }}");
  @endif
</script>
