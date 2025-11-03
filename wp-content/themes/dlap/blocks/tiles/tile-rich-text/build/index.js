(() => {
  'use strict';
  const { registerBlockType } = window.wp.blocks;
  const React = window.React;
  const { __ } = window.wp.i18n;
  const { InspectorControls, MediaUpload, MediaUploadCheck, useBlockProps, ColorPalette, InnerBlocks } =
    window.wp.blockEditor;
  const { PanelBody, Button, TextControl } = window.wp.components;

  registerBlockType('create-block/tile-rich-text', {
    attributes: {
      image: { type: 'string', default: '' },
      title: { type: 'string', default: '' },
      bulletColor: { type: 'string', default: '' },
      media: { type: 'object', default: {} }
    },
    edit: function ({ attributes, setAttributes }) {
      const { image, title, bulletColor, media } = attributes;

      // Image state
      const [mediaId, setMediaId] = React.useState(media && media.id ? media.id : 0);
      const [mediaUrl, setMediaUrl] = React.useState(media && media.url ? media.url : '');

      // Color options for bullet
      const bulletColors = [
        { name: 'Yellow', color: '#fcbe04' },
        { name: 'Green', color: '#d9dc42' },
        { name: 'Red', color: '#e62a4f' },
        { name: 'Blue', color: '#144774' },
        { name: 'Gray', color: '#333333' }
      ];

      // Define allowed blocks
      const ALLOWED_BLOCKS = [
        'core/paragraph',
        'core/heading',
        'core/list',
        'core/image',
        'core/quote',
        'core/code',
        'core/table',
        'core/separator',
        'core/spacer'
      ];

      // Template for initial blocks
      const TEMPLATE = [['core/paragraph', { placeholder: 'Add your content here...' }]];

      return React.createElement(
        React.Fragment,
        null,
        React.createElement(
          InspectorControls,
          null,
          React.createElement(
            PanelBody,
            { title: __('Tile M4: Tile with Image, Title and Content', 'tile-rich-text') },
            React.createElement(
              MediaUploadCheck,
              null,
              React.createElement(MediaUpload, {
                onSelect: (mediaObj) => {
                  setAttributes({ media: mediaObj, image: mediaObj.url || '' });
                  setMediaId(mediaObj.id || 0);
                  setMediaUrl(mediaObj.url || '');
                },
                value: mediaId,
                allowedTypes: ['image'],
                render: ({ open }) =>
                  React.createElement(
                    Button,
                    {
                      className:
                        mediaId === 0 ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview',
                      onClick: open,
                      style: { marginBottom: '1rem' },
                      variant: media && Object.keys(media).length ? '' : 'secondary'
                    },
                    media && Object.keys(media).length
                      ? media.url
                        ? React.createElement('img', { src: media.url, style: { maxWidth: '4.5rem' } })
                        : media.title
                      : __('Choose an image', 'awp')
                  )
              }),
              media && Object.keys(media).length
                ? React.createElement(
                    Button,
                    {
                      onClick: () => {
                        setMediaId(0);
                        setMediaUrl('');
                        setAttributes({ media: {}, image: '' });
                      },
                      style: { display: 'block', width: '100%', textAlign: 'right', margin: '0.5rem 0' },
                      variant: 'link'
                    },
                    __('Remove image', 'awp')
                  )
                : ''
            ),
            React.createElement(TextControl, {
              label: __('Title', 'title'),
              value: title,
              onChange: (e) => setAttributes({ title: e })
            }),
            React.createElement('hr', { style: { border: '2px solid gray' } }),
            React.createElement(TextControl, {
              value: bulletColor || '',
              onChange: (val) => setAttributes({ bulletColor: val }),
              placeholder: '#333333'
            }),
            React.createElement(
              'label',
              {
                style: {
                  fontSize: '11px',
                  fontWeight: 500,
                  lineHeight: 1.4,
                  textTransform: 'uppercase',
                  display: 'block',
                  marginBottom: '6px',
                  marginTop: '1rem'
                }
              },
              __('Bullet Color', 'bullet-color')
            ),
            React.createElement(ColorPalette, {
              value: bulletColor || '',
              onChange: (color) => setAttributes({ bulletColor: color }),
              allowCustom: true,
              clearable: true,
              colors: bulletColors
            })
          )
        ),
        React.createElement(
          'div',
          { ...useBlockProps() },
          React.createElement(
            'div',
            { style: { padding: '1rem' } },
            React.createElement(
              'div',
              {
                style: {
                  width: '100%',
                  display: 'flex',
                  justifyContent: 'flex-start',
                  alignItems: 'center'
                }
              },
              media && media.url
                ? React.createElement('img', {
                    style: { maxWidth: '2rem', marginRight: '1rem' },
                    src: media.url
                  })
                : '',
              React.createElement('strong', { style: { fontSize: '16px', margin: 0 } }, title)
            ),
            React.createElement(
              'div',
              { style: { marginTop: '1rem', width: '100%' } },
              bulletColor &&
                React.createElement('style', null, `.tile-rich-text ul li::marker { color: ${bulletColor}; }`),
              React.createElement(
                'div',
                {
                  className: 'tile-rich-text',
                  style: {
                    border: '2px solid #007cba',
                    borderRadius: '6px',
                    padding: '8px',
                    margin: '10px 0 18px 0'
                  }
                },
                React.createElement(InnerBlocks, {
                  allowedBlocks: ALLOWED_BLOCKS,
                  template: TEMPLATE,
                  templateLock: false
                })
              )
            )
          )
        )
      );
    },
    save: function ({ attributes }) {
      // Don't render image/title here - let the PHP template handle it
      // Only save the InnerBlocks content
      return React.createElement(InnerBlocks.Content);
    }
  });
})();
