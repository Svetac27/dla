(() => {
  'use strict';
  var e,
    t = {
      320: () => {
        const e = window.wp.blocks,
          t = window.React,
          l = window.wp.i18n,
          r = window.wp.blockEditor,
          n = window.wp.components,
          o = JSON.parse('{"UU":"create-block/tile-campaign"}');
        (0, e.registerBlockType)(o.UU, {
          attributes: {
            title: { type: 'string', default: '' },
            description: { type: 'string', default: '' },
            link: { type: 'string', default: '' },
            external: { type: 'boolean', default: false },
            backgroundUrl: { type: 'string', default: '' },
            backgroundId: { type: 'number', default: 0 }
          },
          edit: function ({ attributes: e, setAttributes: o }) {
            const { title: c, description: d, link: s, external: x, backgroundUrl: i, backgroundId: a } = e;
            return (0, t.createElement)(
              t.Fragment,
              null,
              (0, t.createElement)(
                r.InspectorControls,
                null,
                (0, t.createElement)(
                  n.PanelBody,
                  { title: (0, l.__)('Tile M2: Tile Campaign', 'copyright-date-block') },
                  (0, t.createElement)(n.TextControl, {
                    label: (0, l.__)('Title', 'title'),
                    value: c,
                    onChange: (v) => o({ title: v })
                  }),
                  (0, t.createElement)(n.TextControl, {
                    label: (0, l.__)('Description', 'description'),
                    value: d,
                    onChange: (v) => o({ description: v })
                  }),
                  (0, t.createElement)(n.TextControl, {
                    label: (0, l.__)('Link', 'link'),
                    value: s,
                    onChange: (v) => o({ link: v })
                  }),
                  (0, t.createElement)(n.CheckboxControl, {
                    label: (0, l.__)('EXTERNAL LINK', 'external'),
                    checked: !!x,
                    onChange: (v) => o({ external: v })
                  }),
                  (0, t.createElement)(
                    'div',
                    null,
                    (0, t.createElement)(
                      'label',
                      {
                        style: {
                          display: 'block',
                          fontSize: '11px',
                          fontWeight: '500',
                          lineHeight: '1.4',
                          textTransform: 'uppercase',
                          marginBottom: '8px'
                        }
                      },
                      (0, l.__)('Background image', 'background-image')
                    ),
                    (0, t.createElement)(
                      r.MediaUploadCheck,
                      null,
                      (0, t.createElement)(r.MediaUpload, {
                        onSelect: (media) => o({ backgroundUrl: media.url, backgroundId: media.id }),
                        allowedTypes: ['image'],
                        value: a,
                        render: ({ open }) =>
                          i
                            ? (0, t.createElement)(
                                'div',
                                null,
                                (0, t.createElement)('img', {
                                  src: i,
                                  style: { maxWidth: '100%', height: 'auto', marginBottom: '10px' }
                                }),
                                (0, t.createElement)(
                                  n.Button,
                                  {
                                    onClick: () => o({ backgroundUrl: '', backgroundId: 0 }),
                                    variant: 'link',
                                    isDestructive: true
                                  },
                                  (0, l.__)('Remove Image', 'copyright-date-block')
                                )
                              )
                            : (0, t.createElement)(
                                n.Button,
                                {
                                  onClick: open,
                                  variant: 'secondary'
                                },
                                (0, l.__)('Choose Background Image', 'copyright-date-block')
                              )
                      })
                    )
                  )
                )
              ),
              (0, t.createElement)(
                'div',
                { ...(0, r.useBlockProps)() },
                (0, t.createElement)(
                  'div',
                  {
                    style: {
                      display: 'flex',
                      flexDirection: 'column',
                      alignItems: 'flex-start',
                      padding: '1rem',
                      position: 'relative',
                      gap: '10px',
                      backgroundImage: i ? `url(${i})` : undefined,
                      backgroundSize: 'cover',
                      backgroundPosition: 'center',
                      minHeight: '200px'
                    }
                  },
                  (0, t.createElement)('h2', { style: { fontSize: '24px', opacity: c ? 1 : 0.5 } }, c || 'Lorem Ipsum'),
                  (0, t.createElement)(
                    'span',
                    { style: { fontSize: '12px', opacity: d ? 1 : 0.5 } },
                    d || 'Description here'
                  ),
                  s
                    ? (0, t.createElement)(
                        'a',
                        {
                          href: s,
                          style: {
                            color: 'white',
                            textDecoration: 'none',
                            display: 'flex',
                            alignItems: 'center',
                            gap: '10px'
                          }
                        },
                        (0, t.createElement)('span', { style: { fontSize: '12px' } }, 'Read more'),
                        (0, t.createElement)(
                          'svg',
                          { xmlns: 'http://www.w3.org/2000/svg', width: 19.28, height: 19.271 },
                          (0, t.createElement)('path', {
                            d: 'M0 9.624v9.624h19.248V10.54H17.77v7.262H1.478V1.478H8.74V0H0v9.624M11.439.739v.739H16.982l-4.868 4.868-4.868 4.868.522.523.522.522 4.74-4.74 4.74-4.739v5.061h1.478V0H11.439v.739',
                            fill: 'currentColor',
                            'fill-rule': 'evenodd'
                          })
                        )
                      )
                    : ''
                )
              )
            );
          },
          save: function ({ attributes: e }) {
            const { title: c, description: d, link: s, external: x, backgroundUrl: i } = e;
            // Only use attributes, not any variables or components!
            const bgStyle = {
              display: 'flex',
              flexDirection: 'column',
              alignItems: 'flex-start',
              padding: '1rem',
              position: 'relative',
              gap: '10px',
              backgroundImage: i ? `url(${i})` : undefined,
              backgroundSize: i ? 'cover' : undefined,
              backgroundPosition: i ? 'center' : undefined,
              minHeight: '200px'
            };
            return window.React.createElement(
              'div',
              { style: bgStyle },
              window.React.createElement(
                'h2',
                { style: { fontSize: '24px', opacity: c ? 1 : 0.5 } },
                c || 'Lorem Ipsum'
              ),
              window.React.createElement(
                'span',
                { style: { fontSize: '12px', opacity: d ? 1 : 0.5 } },
                d || 'Description here'
              ),
              s
                ? window.React.createElement(
                    'a',
                    {
                      href: s,
                      style: {
                        color: 'white',
                        textDecoration: 'none',
                        display: 'flex',
                        alignItems: 'center',
                        gap: '10px'
                      }
                    },
                    window.React.createElement('span', { style: { fontSize: '12px' } }, 'Read more'),
                    window.React.createElement(
                      'svg',
                      { xmlns: 'http://www.w3.org/2000/svg', width: 19.28, height: 19.271 },
                      window.React.createElement('path', {
                        d: 'M0 9.624v9.624h19.248V10.54H17.77v7.262H1.478V1.478H8.74V0H0v9.624M11.439.739v.739H16.982l-4.868 4.868-4.868 4.868.522.523.522.522 4.74-4.74 4.74-4.739v5.061h1.478V0H11.439v.739',
                        fill: 'currentColor',
                        'fill-rule': 'evenodd'
                      })
                    )
                  )
                : null
            );
          }
        });
      }
    },
    l = {};
  function r(e) {
    var n = l[e];
    if (void 0 !== n) return n.exports;
    var o = (l[e] = { exports: {} });
    return (t[e](o, o.exports, r), o.exports);
  }
  ((r.m = t),
    (e = []),
    (r.O = (t, l, n, o) => {
      if (!l) {
        var i = 1 / 0;
        for (m = 0; m < e.length; m++) {
          for (var [l, n, o] = e[m], a = !0, c = 0; c < l.length; c++)
            (!1 & o || i >= o) && Object.keys(r.O).every((e) => r.O[e](l[c]))
              ? l.splice(c--, 1)
              : ((a = !1), o < i && (i = o));
          if (a) {
            e.splice(m--, 1);
            var s = n();
            void 0 !== s && (t = s);
          }
        }
        return t;
      }
      o = o || 0;
      for (var m = e.length; m > 0 && e[m - 1][2] > o; m--) e[m] = e[m - 1];
      e[m] = [l, n, o];
    }),
    (r.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
    (() => {
      var e = { 57: 0, 350: 0 };
      r.O.j = (t) => 0 === e[t];
      var t = (t, l) => {
          var n,
            o,
            [i, a, c] = l,
            s = 0;
          if (i.some((t) => 0 !== e[t])) {
            for (n in a) r.o(a, n) && (r.m[n] = a[n]);
            if (c) var m = c(r);
          }
          for (t && t(l); s < i.length; s++) ((o = i[s]), r.o(e, o) && e[o] && e[o][0](), (e[o] = 0));
          return r.O(m);
        },
        l = (globalThis.webpackChunkjeck_test_block = globalThis.webpackChunkjeck_test_block || []);
      (l.forEach(t.bind(null, 0)), (l.push = t.bind(null, l.push.bind(l))));
    })());
  var n = r.O(void 0, [350], () => r(320));
  n = r.O(n);
})();
