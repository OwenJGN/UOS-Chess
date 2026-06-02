<?php
$university = "Ashford University";
$tournament_name = "Spring Open Chess Championship 2026";
$tournament_dates = "14–21 June 2026";
$venue = "Ashford Student Union, Room 204";

$photos = [
    ["src" => "https://images.unsplash.com/photo-1529699211952-734e80c4d42b?w=800&q=80", "caption" => "Opening ceremony, Spring 2025"],
    ["src" => "https://images.unsplash.com/photo-1580541832626-2a7131ee809f?w=800&q=80", "caption" => "Board play in the main hall"],
    ["src" => "https://images.unsplash.com/photo-1560174038-da43ac74f01b?w=800&q=80", "caption" => "Analysis session between rounds"],
    ["src" => "https://images.unsplash.com/photo-1611195974226-a6a9be9dd763?w=800&q=80", "caption" => "Previous champions podium"],
];

$schedule = [
    [
        "date"    => "Saturday 14 June",
        "day"     => "Day 1",
        "events"  => [
            ["time" => "09:00", "event" => "Registration & check-in opens"],
            ["time" => "10:00", "event" => "Opening ceremony & welcome address"],
            ["time" => "11:00", "event" => "Round 1 — All sections"],
            ["time" => "13:00", "event" => "Lunch break"],
            ["time" => "14:30", "event" => "Round 2 — All sections"],
            ["time" => "17:00", "event" => "End of play / board analysis"],
        ],
    ],
    [
        "date"    => "Sunday 15 June",
        "day"     => "Day 2",
        "events"  => [
            ["time" => "10:00", "event" => "Round 3 — All sections"],
            ["time" => "12:30", "event" => "Lunch break"],
            ["time" => "14:00", "event" => "Round 4 — All sections"],
            ["time" => "16:30", "event" => "Blitz side event (optional entry)"],
        ],
    ],
    [
        "date"    => "Saturday 21 June",
        "day"     => "Final Day",
        "events"  => [
            ["time" => "10:00", "event" => "Round 5 — All sections"],
            ["time" => "12:30", "event" => "Lunch break"],
            ["time" => "14:00", "event" => "Round 6 — Final round"],
            ["time" => "16:30", "event" => "Prize ceremony & closing address"],
            ["time" => "17:30", "event" => "Social reception (all welcome)"],
        ],
    ],
];

$sections = [
    ["name" => "Open Section",    "eligibility" => "All ECF-rated players", "rounds" => 6, "prizes" => "1st £150 · 2nd £80 · 3rd £40"],
    ["name" => "U1800 Section",   "eligibility" => "ECF grade under 1800",  "rounds" => 6, "prizes" => "1st £100 · 2nd £50 · 3rd £25"],
    ["name" => "Novice Section",  "eligibility" => "Unrated or grade under 1200", "rounds" => 6, "prizes" => "Trophy + certificate"],
];

$rules = [
    [
        "title" => "FIDE Laws of Chess",
        "icon"  => "♟",
        "body"  => "All games are played under the current FIDE Laws of Chess. Players are expected to be familiar with these laws before competing. The chief arbiter's decision is final in all matters of interpretation.",
    ],
    [
        "title" => "Time Control",
        "icon"  => "⏱",
        "body"  => "Each player receives 90 minutes for all moves, plus a 30-second increment from move one. Clock management is the sole responsibility of each player. Arriving more than 30 minutes late forfeits the game.",
    ],
    [
        "title" => "Electronic Devices",
        "icon"  => "📵",
        "body"  => "All electronic devices must be switched off and stored out of sight during play. Any device that rings, vibrates, or is visible during a game will result in immediate forfeiture, regardless of intent.",
    ],
    [
        "title" => "Touch-Move Rule",
        "icon"  => "✋",
        "body"  => "If a player intentionally touches one of their own pieces, they must move it if a legal move exists. If an opponent's piece is touched, it must be captured if legally possible. Adjusting pieces requires announcing 'j'adoube' beforehand.",
    ],
    [
        "title" => "Recording Moves",
        "icon"  => "📝",
        "body"  => "All players in rated sections must record their moves legibly on the score sheet provided. Score sheets are the property of the tournament and must be submitted to the arbiter at the end of each game.",
    ],
    [
        "title" => "Conduct & Fair Play",
        "icon"  => "🤝",
        "body"  => "Players are expected to behave with sportsmanship and respect at all times. Any form of cheating, abusive language, or disruptive behaviour may result in disqualification and referral to the university disciplinary board.",
    ],
    [
        "title" => "Draw Offers",
        "icon"  => "⚖",
        "body"  => "Draw offers may only be made immediately after completing a move and before starting the opponent's clock. Repeated frivolous draw offers may be penalised at the arbiter's discretion.",
    ],
    [
        "title" => "Appeals & Protests",
        "icon"  => "📣",
        "body"  => "Any appeal against an arbiter's decision must be submitted in writing within 30 minutes of the incident. An appeals committee of three uninvolved players will be convened; their ruling is final and binding.",
    ],
];
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($tournament_name) ?> — <?= htmlspecialchars($university) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=Source+Serif+4:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
<style>
  :root {
    --ink:       #1a1410;
    --cream:     #f5f0e8;
    --parchment: #ede5d4;
    --gold:      #b8860b;
    --gold-lt:   #d4a017;
    --board-dk:  #2c1f0e;
    --board-md:  #3d2b12;
    --muted:     #7a6a55;
    --rule-line: rgba(184,134,11,0.25);
    --serif: 'Playfair Display', Georgia, serif;
    --body:  'Source Serif 4', Georgia, serif;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  html { scroll-behavior: smooth; }

  body {
    background: var(--cream);
    color: var(--ink);
    font-family: var(--body);
    font-size: 1rem;
    line-height: 1.7;
  }

  /* ── HEADER ── */
  header {
    background: var(--board-dk);
    color: var(--cream);
    padding: 0;
    position: relative;
    overflow: hidden;
  }

  .header-pattern {
    position: absolute; inset: 0;
    background-image:
      repeating-linear-gradient(45deg, rgba(255,255,255,.02) 0px, rgba(255,255,255,.02) 1px, transparent 1px, transparent 60px),
      repeating-linear-gradient(-45deg, rgba(255,255,255,.02) 0px, rgba(255,255,255,.02) 1px, transparent 1px, transparent 60px);
    pointer-events: none;
  }

  .chess-board-accent {
    position: absolute;
    right: -60px; top: -40px;
    width: 340px; height: 340px;
    opacity: 0.07;
    display: grid;
    grid-template-columns: repeat(8, 1fr);
    grid-template-rows: repeat(8, 1fr);
    transform: rotate(12deg);
  }
  .chess-board-accent span {
    display: block;
  }
  .chess-board-accent span:nth-child(odd of .light) { background: #fff; }

  .header-inner {
    position: relative;
    max-width: 1100px;
    margin: 0 auto;
    padding: 3.5rem 2rem 3rem;
  }

  .uni-badge {
    display: inline-block;
    font-family: var(--body);
    font-size: .78rem;
    font-weight: 300;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--gold-lt);
    border: 1px solid rgba(212,160,23,.4);
    padding: .3rem .9rem;
    margin-bottom: 1.2rem;
  }

  header h1 {
    font-family: var(--serif);
    font-size: clamp(2rem, 5vw, 3.6rem);
    font-weight: 900;
    line-height: 1.1;
    letter-spacing: -.01em;
    max-width: 700px;
    margin-bottom: 1rem;
  }

  .header-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    font-family: var(--body);
    font-size: .9rem;
    color: rgba(245,240,232,.7);
    margin-bottom: 2rem;
  }

  .header-meta span { display: flex; align-items: center; gap: .4rem; }
  .header-meta .dot { color: var(--gold); font-size: 1.2rem; line-height: 1; }

  nav {
    display: flex;
    flex-wrap: wrap;
    gap: .3rem;
    border-top: 1px solid rgba(245,240,232,.12);
    padding-top: 1.5rem;
  }

  nav a {
    color: rgba(245,240,232,.75);
    text-decoration: none;
    font-size: .82rem;
    letter-spacing: .1em;
    text-transform: uppercase;
    padding: .45rem 1rem;
    border: 1px solid transparent;
    transition: all .2s;
  }

  nav a:hover {
    color: var(--gold-lt);
    border-color: rgba(212,160,23,.4);
  }

  /* ── SECTIONS ── */
  section { padding: 5rem 2rem; }
  section:nth-child(even) { background: var(--parchment); }

  .inner { max-width: 1100px; margin: 0 auto; }

  .section-label {
    font-family: var(--body);
    font-size: .75rem;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: .6rem;
  }

  .section-title {
    font-family: var(--serif);
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 700;
    line-height: 1.15;
    margin-bottom: .5rem;
  }

  .title-rule {
    width: 56px; height: 3px;
    background: var(--gold);
    margin: 1.2rem 0 2.5rem;
  }

  /* ── GALLERY ── */
  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 1.2rem;
  }

  .gallery-item {
    position: relative;
    overflow: hidden;
    background: var(--board-md);
  }

  .gallery-item img {
    width: 100%;
    aspect-ratio: 4/3;
    object-fit: cover;
    display: block;
    transition: transform .4s ease, opacity .3s;
    opacity: .88;
  }

  .gallery-item:hover img { transform: scale(1.04); opacity: 1; }

  .gallery-caption {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: linear-gradient(transparent, rgba(26,20,16,.85));
    color: var(--cream);
    font-size: .78rem;
    font-style: italic;
    padding: 1.5rem .8rem .6rem;
    font-family: var(--body);
  }

  /* ── SECTIONS INFO CARDS ── */
  .section-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
  }

  .section-card {
    background: var(--cream);
    border: 1px solid var(--rule-line);
    border-top: 3px solid var(--gold);
    padding: 1.8rem;
  }

  .section-card h3 {
    font-family: var(--serif);
    font-size: 1.3rem;
    margin-bottom: .8rem;
  }

  .section-card dl { font-size: .88rem; }
  .section-card dt {
    font-size: .7rem;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--muted);
    margin-top: .8rem;
  }
  .section-card dd { color: var(--ink); }

  /* ── SCHEDULE ── */
  .schedule-days {
    display: flex;
    flex-direction: column;
    gap: 2.5rem;
  }

  .schedule-day-header {
    display: flex;
    align-items: baseline;
    gap: 1rem;
    margin-bottom: 1rem;
    padding-bottom: .8rem;
    border-bottom: 1px solid var(--rule-line);
  }

  .day-tag {
    font-family: var(--body);
    font-size: .7rem;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--cream);
    background: var(--gold);
    padding: .25rem .65rem;
  }

  .day-date {
    font-family: var(--serif);
    font-size: 1.25rem;
    font-weight: 700;
  }

  .schedule-table {
    width: 100%;
    border-collapse: collapse;
    font-size: .92rem;
  }

  .schedule-table tr {
    border-bottom: 1px solid rgba(122,106,85,.15);
    transition: background .15s;
  }

  .schedule-table tr:hover { background: rgba(184,134,11,.06); }

  .schedule-table td {
    padding: .75rem .5rem;
    vertical-align: top;
  }

  .schedule-table td:first-child {
    font-family: var(--serif);
    font-weight: 700;
    color: var(--gold);
    white-space: nowrap;
    padding-right: 1.5rem;
    width: 80px;
  }

  /* ── RULES ── */
  .rules-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
  }

  .rule-card {
    padding: 1.8rem;
    border: 1px solid var(--rule-line);
    background: var(--cream);
    position: relative;
  }

  .rule-icon {
    font-size: 1.8rem;
    margin-bottom: .8rem;
    display: block;
    line-height: 1;
  }

  .rule-card h3 {
    font-family: var(--serif);
    font-size: 1.1rem;
    margin-bottom: .6rem;
  }

  .rule-card p {
    font-size: .88rem;
    color: #3d3028;
    line-height: 1.65;
  }

  .rule-num {
    position: absolute;
    top: 1.2rem; right: 1.4rem;
    font-family: var(--serif);
    font-size: 2rem;
    font-weight: 900;
    color: rgba(184,134,11,.12);
    line-height: 1;
  }

  /* ── FOOTER ── */
  footer {
    background: var(--board-dk);
    color: rgba(245,240,232,.6);
    padding: 2.5rem 2rem;
    font-size: .82rem;
    text-align: center;
    font-family: var(--body);
    font-weight: 300;
    letter-spacing: .04em;
  }

  footer strong { color: var(--gold-lt); font-weight: 400; }

  footer p + p { margin-top: .4rem; }

  /* ── KING DIVIDER ── */
  .king-divider {
    text-align: center;
    color: var(--gold);
    font-size: 1.6rem;
    opacity: .4;
    letter-spacing: .5rem;
    margin: 0 0 2.5rem;
    display: block;
  }

  /* ── SCROLL FADE ── */
  .fade-in {
    opacity: 0;
    transform: translateY(18px);
    transition: opacity .55s ease, transform .55s ease;
  }
  .fade-in.visible { opacity: 1; transform: none; }

  @media (max-width: 640px) {
    section { padding: 3.5rem 1.2rem; }
    .header-inner { padding: 2.5rem 1.2rem 2rem; }
    nav a { padding: .35rem .7rem; font-size: .75rem; }
  }
</style>
</head>
<body>

<!-- HEADER -->
<header>
  <div class="header-pattern"></div>
  <div class="header-inner">
    <div class="uni-badge">♛ <?= htmlspecialchars($university) ?> Chess Club</div>
    <h1><?= htmlspecialchars($tournament_name) ?></h1>
    <div class="header-meta">
      <span><span class="dot">◆</span> <?= htmlspecialchars($tournament_dates) ?></span>
      <span><span class="dot">◆</span> <?= htmlspecialchars($venue) ?></span>
      <span><span class="dot">◆</span> ECF Rated · FIDE Rules</span>
    </div>
    <nav>
      <a href="#gallery">Gallery</a>
      <a href="#sections">Sections</a>
      <a href="#schedule">Schedule</a>
      <a href="#rules">Rules &amp; Regulations</a>
      <a href="#contact">Contact</a>
    </nav>
  </div>
</header>

<!-- GALLERY -->
<section id="gallery">
  <div class="inner">
    <p class="section-label">Tournament Photography</p>
    <h2 class="section-title">From the Board</h2>
    <div class="title-rule"></div>
    <div class="gallery-grid">
      <?php foreach ($photos as $photo): ?>
      <div class="gallery-item fade-in">
        <img src="<?= htmlspecialchars($photo['src']) ?>" alt="<?= htmlspecialchars($photo['caption']) ?>" loading="lazy">
        <div class="gallery-caption"><?= htmlspecialchars($photo['caption']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SECTIONS -->
<section id="sections">
  <div class="inner">
    <p class="section-label">Competition Categories</p>
    <h2 class="section-title">Tournament Sections</h2>
    <div class="title-rule"></div>
    <p style="max-width:640px; font-style:italic; color:var(--muted); margin-bottom:2rem;">
      Three sections are offered to accommodate players of all experience levels. Prizes are awarded separately within each section.
    </p>
    <div class="section-cards">
      <?php foreach ($sections as $sec): ?>
      <div class="section-card fade-in">
        <h3><?= htmlspecialchars($sec['name']) ?></h3>
        <dl>
          <dt>Eligibility</dt>
          <dd><?= htmlspecialchars($sec['eligibility']) ?></dd>
          <dt>Rounds</dt>
          <dd><?= (int)$sec['rounds'] ?> rounds (Swiss system)</dd>
          <dt>Prizes</dt>
          <dd><?= htmlspecialchars($sec['prizes']) ?></dd>
        </dl>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SCHEDULE -->
<section id="schedule">
  <div class="inner">
    <p class="section-label">Programme of Events</p>
    <h2 class="section-title">Full Schedule</h2>
    <div class="title-rule"></div>
    <span class="king-divider">♔ ♚ ♔</span>
    <div class="schedule-days">
      <?php foreach ($schedule as $day): ?>
      <div class="fade-in">
        <div class="schedule-day-header">
          <span class="day-tag"><?= htmlspecialchars($day['day']) ?></span>
          <span class="day-date"><?= htmlspecialchars($day['date']) ?></span>
        </div>
        <table class="schedule-table">
          <?php foreach ($day['events'] as $evt): ?>
          <tr>
            <td><?= htmlspecialchars($evt['time']) ?></td>
            <td><?= htmlspecialchars($evt['event']) ?></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- RULES -->
<section id="rules">
  <div class="inner">
    <p class="section-label">Conduct &amp; Governance</p>
    <h2 class="section-title">Rules &amp; Regulations</h2>
    <div class="title-rule"></div>
    <div class="rules-grid">
      <?php foreach ($rules as $i => $rule): ?>
      <div class="rule-card fade-in">
        <span class="rule-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
        <span class="rule-icon"><?= $rule['icon'] ?></span>
        <h3><?= htmlspecialchars($rule['title']) ?></h3>
        <p><?= htmlspecialchars($rule['body']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section id="contact" style="background:var(--board-md); color:var(--cream);">
  <div class="inner" style="max-width:680px; text-align:center;">
    <p class="section-label" style="color:var(--gold-lt);">Get In Touch</p>
    <h2 class="section-title" style="color:var(--cream);">Questions &amp; Enquiries</h2>
    <div class="title-rule" style="margin-left:auto; margin-right:auto;"></div>
    <p style="color:rgba(245,240,232,.75); font-style:italic; margin-bottom:2rem;">
      For registration queries, section placements, or general tournament information, please contact the Chess Club committee.
    </p>
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:1.5rem; font-size:.9rem; color:rgba(245,240,232,.8);">
      <div>
        <div style="font-size:.7rem; letter-spacing:.15em; text-transform:uppercase; color:var(--gold-lt); margin-bottom:.3rem;">Email</div>
        chess@ashford.ac.uk
      </div>
      <div>
        <div style="font-size:.7rem; letter-spacing:.15em; text-transform:uppercase; color:var(--gold-lt); margin-bottom:.3rem;">Location</div>
        <?= htmlspecialchars($venue) ?>
      </div>
      <div>
        <div style="font-size:.7rem; letter-spacing:.15em; text-transform:uppercase; color:var(--gold-lt); margin-bottom:.3rem;">Registration Deadline</div>
        7 June 2026
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <p>
    <strong><?= htmlspecialchars($tournament_name) ?></strong>
    &nbsp;·&nbsp; <?= htmlspecialchars($university) ?> Chess Club
  </p>
  <p>Played under FIDE Laws of Chess &nbsp;·&nbsp; ECF affiliated</p>
  <p style="margin-top:.8rem; opacity:.45;">&copy; <?= date('Y') ?> <?= htmlspecialchars($university) ?>. All rights reserved.</p>
</footer>

<script>
  // Scroll fade-in
  const els = document.querySelectorAll('.fade-in');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 60);
        observer.unobserve(e.target);
      }
    });
  }, { threshold: 0.08 });
  els.forEach(el => observer.observe(el));
</script>

</body>
</html>
