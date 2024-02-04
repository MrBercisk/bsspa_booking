// Tambahkan script untuk mengikuti scroll
window.onscroll = function() { scrollFunction(); };

function scrollFunction() {
  var whatsappIcon = document.querySelector('.whatsapp-floating');
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    whatsappIcon.style.display = 'block';
  } else {
    whatsappIcon.style.display = 'none';
  }
}
