document.addEventListener('DOMContentLoaded', () => {

  const toolsSelect = document.getElementById('tools');
  const btnFilters = document.querySelectorAll('.filter-btn');
  const items = document.querySelectorAll('.tool-item');
  const valid = ['all', 'file', 'image', 'video', 'audio', 'utilities'];

  function setActiveButtons(value) {
    btnFilters.forEach(btn => {
      const active = btn.dataset.filter === value;
      btn.setAttribute('aria-pressed', active ? 'true' : 'false');
      btn.classList.toggle('is-active', active);
    });
  }

  function applyFilter(value){
    const val = valid.includes(value) ? value : 'all';

    if(val === 'all'){
      items.forEach(item => {
        item.hidden = false;
        item.setAttribute('aria-hidden','false');
      });
    } else {
      const match = `${val}-tools`;
      items.forEach(item => {
        const show = item.classList.contains(match);
        item.hidden = !show;
        item.setAttribute('aria-hidden', show ? 'false' : 'true');
      });
    }

    // sincronizza select e stato pulsanti
    if (toolsSelect) toolsSelect.value = val;
    setActiveButtons(val);
  }

  // Evento per Mobile
  toolsSelect.addEventListener('change', () => {
    applyFilter(toolsSelect.value);
  });

  // Evento per Tablet && Desktop
  btnFilters.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      const value = btn.dataset.filter;
      applyFilter(value);

      // Per sincronizzare la select
      toolsSelect.value = value;
    });
  });

  // Stato iniziale
  applyFilter('all');
  
});
