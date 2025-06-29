function liveWaktu() {
  const now = new Date();

  const hari = now.toLocaleString("id-ID", {
    weekday: "long",
    year: "numeric",
    month: "2-digit",
    day: "2-digit",
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit",
    hour12: false,
  });

  const jam = document.getElementById("live");
  if (jam) {
    jam.value = hari;
  }

  const tanggal = now.toISOString().split("T")[0]; // yyyy-mm-dd
  const waktu = now.toTimeString().split(" ")[0]; // HH:MM:SS

  const Itanggal = document.getElementById("tanggal");
  const Ijam = document.getElementById("jam");

  if (Itanggal) {
    Itanggal.value = tanggal;
  }

  if (Ijam) {
    Ijam.value = waktu;
  }
}
setInterval(liveWaktu, 1000);
liveWaktu();
