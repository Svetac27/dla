(() => {
  'use strict';
  var e,
    t = {
      292: () => {
        const e = window.wp.blocks,
          t = window.React,
          l = window.wp.i18n,
          r = window.wp.blockEditor,
          o = window.wp.components,
          n = JSON.parse('{"UU":"create-block/tile-with-circle-progress"}');
        (0, e.registerBlockType)(n.UU, {
          edit: function ({ attributes: e, setAttributes: n }) {
            const { donuts: a, title: i, sub_title: s, text: c } = e,
              [p, d] = (0, t.useState)(a ? a.length : 0),
              [u, m] = (0, t.useState)(a || []),
              g = [
                { name: 'Red', color: '#E62A4F' },
                { name: 'Mid Red', color: '#F9C9D3' },
                { name: 'Green', color: '#D9DC42' },
                { name: 'Yellow', color: '#FCBE04' },
                { name: 'Mid Blue', color: '#D9EAF3' }
              ],
              h = () => {
                let e = [...u];
                ((e[p] = {}), n({ donuts: e }), d(p + 1));
              },
              v = (e, t, l) => {
                const r = [...u];
                (r[e] || (r[e] = {}), (r[e][t] = l), m(r), n({ donuts: r }));
              };
            return (0, t.createElement)(
              t.Fragment,
              null,
              (0, t.createElement)(
                r.InspectorControls,
                null,
                (0, t.createElement)(
                  o.PanelBody,
                  { title: (0, l.__)('Tile 3: Tile with Donuts', 'tile-with-circle-progress') },
                  (0, t.createElement)(o.TextControl, {
                    label: (0, l.__)('Title', 'title'),
                    value: i,
                    onChange: (e) => n({ title: e })
                  }),
                  (0, t.createElement)(o.TextControl, {
                    label: (0, l.__)('Sub Title', 'sub_title'),
                    value: s,
                    onChange: (e) => n({ sub_title: e })
                  }),
                  (0, t.createElement)(o.TextControl, {
                    label: (0, l.__)('Bottom Text', 'text'),
                    value: c,
                    onChange: (e) => n({ text: e })
                  }),
                  (0, t.createElement)(o.Button, { variant: 'secondary', onClick: h }, 'Add Donut'),
                  (0, t.createElement)('hr', { style: { border: '2px solid gray' } }),
                  [...Array(p)].map((e, r) =>
                    (0, t.createElement)(
                      'div',
                      { key: r },
                      (0, t.createElement)(
                        'a',
                        {
                          style: { color: 'red', cursor: 'pointer' },
                          onClick: () => {
                            ((e) => {
                              console.log(e);
                              let t = [];
                              if (u && u.length) for (let l = 0; l < u.length; l++) e !== l && t.push(u[l]);
                              (d(t.length), m(t), n({ donuts: t }));
                            })(r);
                          }
                        },
                        'Remove Donut'
                      ),
                      (0, t.createElement)(o.TextControl, {
                        label: (0, l.__)('Donut Value', `donut_${r}_value`),
                        value: a && a[r] && a[r].progress ? a[r].progress : null,
                        onChange: (e) => {
                          v(r, 'progress', e);
                        }
                      }),
                      (0, t.createElement)(
                        'label',
                        {
                          style: {
                            fontSize: '11px',
                            fontWeight: 500,
                            lineHeight: 1.4,
                            textTransform: 'uppercase',
                            display: 'inline-block',
                            marginBottom: 'calc(8px)',
                            padding: '0px'
                          }
                        },
                        'DONUT COLOR '
                      ),
                      (0, t.createElement)(o.ColorPalette, {
                        label: (0, l.__)('Progress Color', `progress_${r}_color`),
                        colors: g,
                        value: a && a[r] && a[r].progress_color ? a[r].progress_color : null,
                        onChange: (e) => {
                          v(r, 'progress_color', e);
                        }
                      }),
                      (0, t.createElement)(o.TextControl, {
                        label: (0, l.__)('Donut Bottom Text'),
                        value: a && a[r] && a[r].text ? a[r].text : null,
                        onChange: (e) => {
                          v(r, 'text', e);
                        }
                      }),
                      (0, t.createElement)('hr', null)
                    )
                  ),
                  p > 0 ? (0, t.createElement)(o.Button, { variant: 'secondary', onClick: h }, 'Add Donut') : ''
                )
              ),
              (0, t.createElement)(
                'div',
                { ...(0, r.useBlockProps)() },
                (0, t.createElement)(
                  'div',
                  { style: { padding: '1rem' } },
                  (0, t.createElement)('h2', { style: { fontSize: '1rem' } }, i),
                  (0, t.createElement)('p', { style: { fontSize: '10px' } }, s),
                  (0, t.createElement)(
                    'div',
                    { style: { display: 'flex', textAlign: 'center', flexWrap: 'wrap' } },
                    [...Array(p)].map((e, l) =>
                      (0, t.createElement)(
                        'div',
                        { style: { width: '33.3333%' } },
                        (0, t.createElement)(
                          'div',
                          {
                            style: {
                              width: '60px',
                              height: '60px',
                              padding: '1rem',
                              borderRadius: '50%',
                              margin: 'auto',
                              alignItems: 'center',
                              border: `2px solid ${a[l].progress_color}`
                            }
                          },
                          (0, t.createElement)(
                            'div',
                            { style: { fontSize: '32px', whiteSpace: 'nowrap' } },
                            a[l].progress ? a[l].progress + '%' : ''
                          )
                        ),
                        (0, t.createElement)('div', { style: { fontSize: '16px' } }, a[l].text)
                      )
                    )
                  ),
                  (0, t.createElement)('p', { style: { fontSize: '10px', padddingTop: '26px' } }, c)
                )
              )
            );
          }
        });
      }
    },
    l = {};
  function r(e) {
    var o = l[e];
    if (void 0 !== o) return o.exports;
    var n = (l[e] = { exports: {} });
    return (t[e](n, n.exports, r), n.exports);
  }
  ((r.m = t),
    (e = []),
    (r.O = (t, l, o, n) => {
      if (!l) {
        var a = 1 / 0;
        for (p = 0; p < e.length; p++) {
          for (var [l, o, n] = e[p], i = !0, s = 0; s < l.length; s++)
            (!1 & n || a >= n) && Object.keys(r.O).every((e) => r.O[e](l[s]))
              ? l.splice(s--, 1)
              : ((i = !1), n < a && (a = n));
          if (i) {
            e.splice(p--, 1);
            var c = o();
            void 0 !== c && (t = c);
          }
        }
        return t;
      }
      n = n || 0;
      for (var p = e.length; p > 0 && e[p - 1][2] > n; p--) e[p] = e[p - 1];
      e[p] = [l, o, n];
    }),
    (r.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
    (() => {
      var e = { 57: 0, 350: 0 };
      r.O.j = (t) => 0 === e[t];
      var t = (t, l) => {
          var o,
            n,
            [a, i, s] = l,
            c = 0;
          if (a.some((t) => 0 !== e[t])) {
            for (o in i) r.o(i, o) && (r.m[o] = i[o]);
            if (s) var p = s(r);
          }
          for (t && t(l); c < a.length; c++) ((n = a[c]), r.o(e, n) && e[n] && e[n][0](), (e[n] = 0));
          return r.O(p);
        },
        l = (globalThis.webpackChunkjeck_test_block = globalThis.webpackChunkjeck_test_block || []);
      (l.forEach(t.bind(null, 0)), (l.push = t.bind(null, l.push.bind(l))));
    })());
  var o = r.O(void 0, [350], () => r(292));
  o = r.O(o);
})();
