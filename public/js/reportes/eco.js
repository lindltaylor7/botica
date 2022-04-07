const inputTime = document.getElementById('time');
const templateTable = document.getElementById('template-table').content;
const sumaTotal = document.getElementById('sumTotal')
const contentTable = document.getElementById('contentTable')
const tableModal = document.getElementById('tableModal')
const clienteModal = document.getElementById('clienteModal')
const dniModal = document.getElementById('dniModal')

function showDataDom(head, data, value, container) {
  const rowHead = templateTable.querySelector('#rowHead')
  const tableBody = templateTable.querySelector('#table-body')

  rowHead.innerHTML = ''
  tableBody.innerHTML = ''

  console.log(data)

  head.forEach(el   => {
    const th = document.createElement('th');
    th.classList.add("d-md-table-cell")
    th.textContent = el
    rowHead.appendChild(th)
  })
  
  data.forEach(el => {
    const rowBody = document.createElement('tr');

    value.forEach(val => {
      const td = document.createElement('td');
      
      if (['sums', 'total_sale', 'amount'].includes(val)) {
        td.textContent = `S/. ${el[val]}`
      } else if (val === 'button') {
        const button = document.createElement('button');
        button.textContent = 'Detalle'
        button.classList.add('btn', 'btn-primary')
        button.id = 'btnReport'

        button.type = 'button'
        button.dataset.bsToggle = "modal"
        button.dataset.bsTarget = "#exampleModal"

        let objDatos = {
          detail: el.details,
          customer: {
            name: el.customer.name || 'Sin nombre',
            dni: el.customer.dni || 'Sin dni'
          }
        }

        button.dataset.datos = JSON.stringify(objDatos)

        td.appendChild(button)
      } else {
        let valSplit = val.split('.')
        
        if (valSplit.length > 1) {
          td.textContent = el[valSplit[0]][valSplit[1]] || el[valSplit[0]].generic_name
        } else {
          td.textContent = el[val]
        }
      }
      
      rowBody.append(td)  
    })

    tableBody.appendChild(rowBody)
  })
  
  const templateHead = document.importNode(templateTable, true);
  document.getElementById(container).appendChild(templateHead)
}

document.addEventListener('change', e => {
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
    contentTable.innerHTML = ''
    sumaTotal.textContent = ''

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
    contentTable.innerHTML = ''

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
          sumaTotal.textContent = `S/. ${result.sumaTotal}`

          showDataDom(
            ['Mes/Año', 'Monto total'],
            result.sale,
            ['months', 'sums'],
            'contentTable'
          )

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
          sumaTotal.textContent = `S/. ${result.sumaTotal}`

          showDataDom(
            ['Vendedor', 'Fecha', 'Monto Total', 'Detalle'],
            result.sale,
            ['seller', 'date', 'total_sale', 'button'],
            'contentTable'
          )
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
          sumaTotal.textContent = `S/. ${result.sumaTotal}`

          showDataDom(
            ['Vendedor', 'Fecha', 'Monto Total', 'Detalle'],
            result.sale,
            ['seller', 'date', 'total_sale', 'button'],
            'contentTable'
          )
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

document.addEventListener('click', e => {
  if (e.target.matches('#btnReport')) {
    let data = JSON.parse(e.target.dataset.datos)
    tableModal.innerHTML = ''

    clienteModal.textContent = data.customer.name
    dniModal.textContent = data.customer.dni

    if(data.detail.length !== 0) {
      showDataDom(
        ['Nombre comercial', 'Marca comercial', 'Cantidad', 'Monto'],
        data.detail,
        ['detailable.tradename', 'detailable.trademark', 'quantity', 'amount'],
        'tableModal'
      )
    } else {
      tableModal.innerHTML = `
        <h1 class="text-center">Sin detalle</h1>
      `
    }
  }
})
