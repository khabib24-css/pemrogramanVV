const mulai = document.getElementById("tanggal_mulai");
const berakhir = document.getElementById("tanggal_berakhir");
const jumlahHari = document.getElementById("jumlah_hari");

function hitungHari() {
  const tglMulai = new Date(mulai.value);
  const tglAkhir = new Date(berakhir.value);
  if (!isNaN(tglMulai) && !isNaN(tglAkhir) && tglAkhir >= tglMulai) {
    const selisih = (tglAkhir - tglMulai) / (1000 * 60 * 60 * 24) + 1;
    jumlahHari.value = selisih;
  } else {
    jumlahHari.value = "";
  }
}
if (mulai && berakhir) {
  mulai.addEventListener("change", hitungHari);
  berakhir.addEventListener("change", hitungHari);
}

// waktu otomatis
