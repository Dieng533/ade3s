// Dynamic ticker messages
document.addEventListener('DOMContentLoaded', () => {
  const messages = [
    '🌱 Plus de 3000 arbres plantés à Gandon (Mérina Sall, Makka Toubé, Rao, Sanar, Cité Niakh...)',
    '🏥 Consultations gratuites à Poundioum réalisées avec succès (3 fois)',
    '👨\u200d👩\u200d👧\u200d👦 Soutien aux familles et projets locaux',
  ];
  const ticker = document.getElementById('dynamicMessages');
  if (!ticker) return;
  ticker.innerHTML = messages.join(' • ');
});


