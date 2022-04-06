

document.addEventListener('change', e => {
  const inputTime = document.getElementById('time');

  const boxCalendar = document.getElementById('block-calendar'),
    boxMes = document.getElementById('block-mes'),
    boxYear = document.getElementById('block-year');

  const inputCalendar = document.getElementById('fecha_calendar'),
    inputMes = document.getElementById('mes'),
    inputYear = document.getElementById('year');


  const agregarInput = (style, ...box) => {
    box.forEach(el => {
      el.querySelector('input, select').value = '';
      el.classList.remove(style)
    })
  }

  const ocultarInput =  (style, ...box) => {
    box.forEach(el => {
      el.querySelector('input, select').value = '';
      el.classList.add(style)
    })
  }

  function requestFetch(url, body) {
    let options = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
    }

    options.body = JSON.stringify(body);
    return fetch(url, options)
  }

  if (e.target.matches('#time')) {
    if (e.target.value === '1') {
      agregarInput('d-none', boxCalendar)
      ocultarInput('d-none', boxMes, boxYear)
    } else if(e.target.value === '2') {
      agregarInput('d-none', boxMes, boxYear)
      ocultarInput('d-none', boxCalendar)
    } else if (e.target.value === '3') {
      agregarInput('d-none', boxYear)
      ocultarInput('d-none', boxMes, boxCalendar)
    }
  }

  if (e.target.matches('#year') || e.target.matches('#mes') || e.target.matches('#fecha_calendar')) {
    if (inputTime.value === '3') {
      if (!inputYear.value) return;

      async function getData(url, data) {
        try {
          const res = await requestFetch(url, data)

          if (!res.ok) throw({
            err: true,
            status: res.status || '00',
            statusText: res.statusText || 'Ocurrio un error'
          })

          const result = await res.json();
          console.log(result)
        } catch (error) {
          console.log(error) 
        }
      }

      getData('../reportes/economico/year', {
        año: inputYear.value
      })
    }

    if (inputTime.value === '2') {
      if (!inputYear.value || !inputMes.value) return;

      async function getData(url, data) {
        try {
          const res = await requestFetch(url, data)

          if (!res.ok) throw({
            err: true,
            status: res.status || '00',
            statusText: res.statusText || 'Ocurrio un error'
          })

          const result = await res.json();
          console.log(result)
        } catch (error) {
          console.log(error) 
        }
      }

      getData('../reportes/economico/month', {
        año: inputYear.value,
        mes: inputMes.value
      })
    }

    if (inputTime.value === '1') {
      if (!inputCalendar.value) return;

      async function getData(url, data) {
        try {
          const res = await requestFetch(url, data)

          if (!res.ok) throw({
            err: true,
            status: res.status || '00',
            statusText: res.statusText || 'Ocurrio un error'
          })

          const result = await res.json();
          console.log(result)
        } catch (error) {
          console.log(error) 
        }
      }

      getData('../reportes/economico/day', {
        dia: inputCalendar.value,
      })
    }
  }
})

