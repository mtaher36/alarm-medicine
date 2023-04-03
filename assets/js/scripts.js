const [hourSelect, minSelect, ampmSelect] = document.querySelectorAll('.alam-setting form select');
const nowTime = document.querySelector('.dump .text-center .time');
const alarmSetBtn = document.getElementById('alarm-set-btn');
const alarmBox = document.querySelector('.alam-setting form');
let hasBeenAlerted = false;

let alarmTime,
  isAlarmSet = false;
let audioT = new Audio('http://localhost/projek-alarm/assets/js/nada.mp3');

for (let i = 12; i > 0; i--) {
  i = i < 10 ? '0' + i : i;
  const option = `<option value="${i}">${i}</option>`;
  hourSelect.firstElementChild.insertAdjacentHTML('afterend', option);
}
for (let i = 59; i > 0; i--) {
  i = i < 10 ? '0' + i : i;
  const option = `<option value="${i}">${i}</option>`;
  minSelect.firstElementChild.insertAdjacentHTML('afterend', option);
}

setInterval(() => {
  const date = new Date();
  let hour = date.getHours();
  let min = date.getMinutes();
  let sec = date.getSeconds();
  let am_pm = 'AM';

  if (hour > 12) {
    hour = hour - 12;
    am_pm = 'PM';
  }
  if (hour === 0) {
    hour = 12;
  }
  hour = hour < 10 ? '0' + hour : hour;
  min = min < 10 ? '0' + min : min;
  sec = sec < 10 ? '0' + sec : sec;
  nowTime.textContent = `${hour} : ${min} : ${sec} ${am_pm}`;

  if (alarmTime === `${hour} : ${min} : ${am_pm}` && !hasBeenAlerted) {
    hasBeenAlerted = true;
    const namaJudul = document.getElementById('inputName').value;
    const namaObat = document.getElementById('inputObat').value;
    const dosis = document.getElementById('inputDosis').value;
    let pesan = 'HALLOO: ' + namaJudul + '\nSaatnya Kamuu meminum obat : ' + namaObat + '\ndengan Dosis sebesar  ' + dosis + '  dosis';
    audioT.play();
    swal({
      title: 'SEKEDAR MENGINGATKANNN!',
      text: pesan,
      confirmButtonText: 'OK',
      onClose: () => {
        audioT.pause();
      },
    }).then(() => {
      audio.currentTime = 0;
    });
    audioT.loop = true;
    setTimeout(() => {
      audioT.pause();
      hasBeenAlerted = false;
    }, 60000);
  }
}, 1000);

const getTime = () => {
  if (hourSelect.value === 'hour' || minSelect.value === 'minute') {
    alert('Please select a vaild date');
    return;
  }
  if (isAlarmSet) {
    alarmTime = '';
    audioT.pause();
    alarmBox.classList.remove('disable');
    alarmSetBtn.value = 'Set Alarm';
    return (isAlarmSet = false);
  }
  isAlarmSet = true;
  const time = `${hourSelect.value} : ${minSelect.value} : ${ampmSelect.value}`;
  alarmTime = time;
  alarmBox.classList.add('disable');
  alarmSetBtn.value = 'Clear Alarm';
};
alarmSetBtn.addEventListener('click', getTime);
