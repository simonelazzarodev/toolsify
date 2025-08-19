document.addEventListener('DOMContentLoaded', () => {
  // Se < 768px lo consideriamo mobile (puoi cambiare il breakpoint)
  const MOBILE_BREAKPOINT = 768;
  const isMobile = () => window.matchMedia(`(max-width:${MOBILE_BREAKPOINT - 1}px)`).matches;

  const select = document.getElementById('tools');
  const btnContainer = document.querySelector('.btn-filters');
  const items = Array.from(document.querySelectorAll('.tools-section .tool-item'));

  const allowed = new Set(['all', 'image', 'video', 'file', 'audio', 'utilities']);
  let lastValue = null; // ricorda l’ultima scelta utente

  // Categoria dell'item da classe tipo "image-tools" -> "image"
  const getItemCategory = (el) => {
    const hit = Array.from(el.classList).find(c => c.endsWith('-tools'));
    return hit ? hit.replace(/-tools$/, '') : '';
  };

  // Normalizza testo/valori
  const norm = (v) => (v || '').toString().trim().toLowerCase();

  // Valore del bottone (preferisce data-filter, altrimenti deduce dal testo)
  const btnToValue = (btn) => {
    const data = norm(btn.dataset.filter);
    if (allowed.has(data)) return data;
    const t = norm(btn.textContent);
    if (t.includes('image')) return 'image';
    if (t.includes('video')) return 'video';
    if (t.includes('file')) return 'file';
    if (t.includes('audio')) return 'audio';
    if (t.includes('utilit')) return 'utilities';
    return 'all';
  };

  // Evidenzia il bottone attivo
  const setActiveBtn = (value) => {
    if (!btnContainer) return;
    btnContainer.querySelectorAll('.filter-btn').forEach(btn => {
      const active = btnToValue(btn) === value;
      btn.classList.toggle('active', active);
      btn.setAttribute('aria-pressed', active ? 'true' : 'false');
    });
  };

  // Applica il filtro
  const applyFilter = (value) => {
    const val = allowed.has(value) ? value : 'all';
    items.forEach(item => {
      const show = (val === 'all') || (getItemCategory(item) === val);
      item.hidden = !show;
    });
    if (select && select.value !== val) select.value = val; // sincronizza select
    setActiveBtn(val);                                     // sincronizza bottoni
    lastValue = val;
  };

  // Eventi
  if (select) {
    select.addEventListener('change', () => applyFilter(select.value));
  }
  if (btnContainer) {
    btnContainer.addEventListener('click', (e) => {
      const btn = e.target.closest('.filter-btn');
      if (!btn) return;
      e.preventDefault();
      applyFilter(btnToValue(btn));
    });
  }

  // Default iniziale in base al viewport (solo al primo load)
  const initial = isMobile() ? 'file' : 'all';
  applyFilter(initial);
});
