/* Vinyl Shelf — sample catalog data + brand-safe cover generator.
   No real album art is used; covers are generated as on-brand gradient
   "sleeves" (SVG data URIs) so the kit reads as a real collection
   without shipping copyrighted imagery. */
(function () {
  const palettes = [
    ['#3B6FE5', '#0E1428'],
    ['#FFC93C', '#141C36'],
    ['#37C98A', '#0A0F1F'],
    ['#FF6B5E', '#141C36'],
    ['#5E8CFF', '#070A16'],
    ['#E9A712', '#0E1428'],
    ['#90B2FF', '#141C36'],
    ['#26345E', '#FFC93C'],
  ];

  function cover(seed, initial) {
    const p = palettes[seed % palettes.length];
    const svg =
      `<svg xmlns='http://www.w3.org/2000/svg' width='300' height='300'>
        <defs>
          <linearGradient id='g' x1='0' y1='0' x2='1' y2='1'>
            <stop offset='0' stop-color='${p[0]}'/>
            <stop offset='1' stop-color='${p[1]}'/>
          </linearGradient>
        </defs>
        <rect width='300' height='300' fill='${p[1]}'/>
        <circle cx='218' cy='84' r='128' fill='url(#g)' opacity='0.85'/>
        <circle cx='218' cy='84' r='128' fill='none' stroke='rgba(255,255,255,0.12)'/>
        <circle cx='60' cy='250' r='70' fill='none' stroke='${p[0]}' stroke-width='1.5' opacity='0.5'/>
        <text x='26' y='268' font-family='Bricolage Grotesque, sans-serif' font-size='120' font-weight='800' fill='rgba(255,255,255,0.9)'>${initial}</text>
      </svg>`;
    return 'data:image/svg+xml;utf8,' + encodeURIComponent(svg);
  }

  const raw = [
    { title: 'Kind of Blue', artist: 'Miles Davis', year: '1959', format: 'LP', genre: 'Jazz', cat: 'CL 1355', cond: 'Near Mint', rating: 5, status: 'owned' },
    { title: 'In Rainbows', artist: 'Radiohead', year: '2007', format: 'LP', genre: 'Rock', cat: 'XLLP 324', cond: 'Mint', rating: 5, status: 'owned' },
    { title: 'Voodoo', artist: "D'Angelo", year: '2000', format: '2×LP', genre: 'Soul', cat: 'V 2894', cond: 'VG+', rating: 4, status: 'owned' },
    { title: 'Discovery', artist: 'Daft Punk', year: '2001', format: '2×LP', genre: 'Electronic', cat: '724384960', cond: 'Near Mint', rating: 5, status: 'owned' },
    { title: 'Aja', artist: 'Steely Dan', year: '1977', format: 'LP', genre: 'Rock', cat: 'AB 1006', cond: 'VG+', rating: 4, status: 'owned' },
    { title: 'Blue Train', artist: 'John Coltrane', year: '1957', format: 'LP', genre: 'Jazz', cat: 'BLP 1577', cond: 'VG', rating: 5, status: 'owned' },
    { title: 'Random Access Memories', artist: 'Daft Punk', year: '2013', format: '2×LP', genre: 'Electronic', cat: '88883716', cond: 'Mint', rating: 4, status: 'owned' },
    { title: 'The Low End Theory', artist: 'A Tribe Called Quest', year: '1991', format: 'LP', genre: 'Hip-Hop', cat: 'JIVE 1418', cond: 'VG+', rating: 5, status: 'owned' },
    { title: 'Rumours', artist: 'Fleetwood Mac', year: '1977', format: 'LP', genre: 'Rock', cat: 'BSK 3010', cond: 'VG', rating: 4, status: 'owned' },
  ];

  const wish = [
    { title: 'Mingus Ah Um', artist: 'Charles Mingus', year: '1959', format: 'LP', genre: 'Jazz', cat: 'CS 8171', status: 'wishlist' },
    { title: 'Songs in the Key of Life', artist: 'Stevie Wonder', year: '1976', format: '2×LP', genre: 'Soul', cat: 'T13-340', status: 'wishlist' },
    { title: 'Homework', artist: 'Daft Punk', year: '1997', format: '2×LP', genre: 'Electronic', cat: 'V 2821', status: 'wishlist' },
    { title: 'Moanin\u2019', artist: 'Art Blakey', year: '1959', format: 'LP', genre: 'Jazz', cat: 'BLP 4003', status: 'wishlist' },
  ];

  const search = [
    { title: 'Bitches Brew', artist: 'Miles Davis', year: '1970', format: '2×LP', genre: 'Jazz', cat: 'GP 26' },
    { title: 'A Love Supreme', artist: 'John Coltrane', year: '1965', format: 'LP', genre: 'Jazz', cat: 'A-77' },
    { title: 'Maggot Brain', artist: 'Funkadelic', year: '1971', format: 'LP', genre: 'Funk', cat: 'WS 2007' },
  ];

  const withCover = (arr) => arr.map((r, i) => ({ ...r, id: r.title + i, cover: cover(i + r.title.length, r.title[0]) }));

  window.VS_DATA = {
    owned: withCover(raw),
    wishlist: withCover(wish),
    search: withCover(search),
    cover,
  };
})();
