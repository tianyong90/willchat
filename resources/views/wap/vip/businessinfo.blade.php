<extend name="base"/>
<block name="main-content">
  <style>
    .am-accordion-content {
      background-color: #fff;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .company-logo {
      display: block;
      margin-top: 15px;
    }

    .company-name {
      font-size: 1em;
      line-height: 1.4em;
      color: #222;
      padding-top: 20px;
    }

    .company-shortname {
      font-size: 0.75em;
      line-height: 1em;
      margin: 0;
      color: #888;
    }
    .business-info img {
      display: block;
      max-width: 100%;
      height: auto;
      margin: 0 auto;
    }
    .ueditor_baidumap {
      display: block;
      max-width: 100%;
    }
  </style>
  <div class="am-container">
    <img class="company-logo am-u-sm-3" src="__ROOT__{$businessinfo.logo_path}" alt=""/>

    <div class="am-u-sm-9">
      <h2 class="company-name">{$businessinfo.name}</h2>

      <h3 class="company-shortname">{$businessinfo.shortname}</h3>
    </div>
  </div>
  <section data-am-widget="accordion" class="am-accordion am-accordion-default"
           data-am-accordion='{}'>
    <dl class="am-accordion-item am-active">
      <dt class="am-accordion-title">联系方式</dt>
      <dd class="am-accordion-bd am-collapse am-in">
        <div class="am-accordion-content">
          <ul>
            <li>电话：{$businessinfo.telephone}</li>
            <li>传真：{$businessinfo.fax}</li>
            <li>电邮：{$businessinfo.email}</li>
            <li>地址：{$businessinfo.address}</li>
          </ul>
        </div>
      </dd>
    </dl>
    <dl class="am-accordion-item">
      <dt class="am-accordion-title">商家简介</dt>
      <dd class="am-accordion-bd am-collapse ">
        <div class="am-accordion-content business-info">
          {$businessinfo.intro}
        </div>
      </dd>
    </dl>
  </section>
</block>