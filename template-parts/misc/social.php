<nav class="social_links">
    <ul>
        <?php if ($url = get_field('facebook_url', 'options')): ?>
            <li class="facebook">
                <a href="<?= $url; ?>" target="_blank" rel="noreferrer noopener" aria-label="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20.001" viewBox="0 0 20 20.001">
                        <path d="M9.881,20H4a4,4,0,0,1-4-4V4A4,4,0,0,1,4,0H16a4,4,0,0,1,4,4V16a4,4,0,0,1-4,4H12.709V13.159h2.359l.353-2.667H12.709v-1.7c0-.779.231-1.3,1.357-1.3h1.45V5.106A19.937,19.937,0,0,0,13.4,5a3.578,3.578,0,0,0-2.545.906,3.524,3.524,0,0,0-.977,2.618v1.967H7.516v2.667H9.881V20Z" fill="#fff"></path>
                    </svg>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($url = get_field('twitter_url', 'options')): ?>
            <li class="twitter">
                <a href="<?= $url; ?>" target="_blank" rel="noreferrer noopener" aria-label="Twitter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.253" viewBox="0 0 20 16.253">
                        <path d="M20,1.924a8.192,8.192,0,0,1-2.357.646A4.11,4.11,0,0,0,19.448.3a8.22,8.22,0,0,1-2.606,1A4.106,4.106,0,0,0,9.849,5.037,11.648,11.648,0,0,1,1.393.751,4.109,4.109,0,0,0,2.662,6.229,4.086,4.086,0,0,1,.8,5.716,4.106,4.106,0,0,0,4.095,9.791a4.113,4.113,0,0,1-1.853.07A4.106,4.106,0,0,0,6.075,12.71,8.25,8.25,0,0,1,0,14.41a11.616,11.616,0,0,0,6.29,1.843A11.6,11.6,0,0,0,17.952,4.048,8.354,8.354,0,0,0,20,1.924Z" fill="#fff"></path>
                    </svg>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($url = get_field('youtube_url', 'options')): ?>
            <li class="youtube">
                <a href="<?= $url; ?>" target="_blank" rel="noreferrer noopener" aria-label="YouTube">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15">
                        <path d="M10.007,15c-2.566,0-4.941-.057-6.353-.154-1.623-.111-2.532-.656-3.037-1.824S.012,10.123,0,7.5C.012,4.874.117,3.129.618,1.973S2.031.264,3.654.153C5.066.057,7.441,0,10.007,0s4.932.057,6.339.153c1.623.111,2.532.657,3.037,1.825s.6,2.9.617,5.522c-.012,2.625-.118,4.371-.618,5.527s-1.413,1.71-3.036,1.82C14.939,14.943,12.569,15,10.007,15ZM7.5,4.167v6.666l6.667-3.339Z" fill="#fff"></path>
                    </svg>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($url = get_field('linkedin_url', 'options')): ?>
            <li class="linkedin"><!-- todo: need linkedin svg -->
                <a href="<?= $url; ?>" target="_blank" rel="noreferrer noopener" aria-label="YouTube">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15">
                        <path d="M10.007,15c-2.566,0-4.941-.057-6.353-.154-1.623-.111-2.532-.656-3.037-1.824S.012,10.123,0,7.5C.012,4.874.117,3.129.618,1.973S2.031.264,3.654.153C5.066.057,7.441,0,10.007,0s4.932.057,6.339.153c1.623.111,2.532.657,3.037,1.825s.6,2.9.617,5.522c-.012,2.625-.118,4.371-.618,5.527s-1.413,1.71-3.036,1.82C14.939,14.943,12.569,15,10.007,15ZM7.5,4.167v6.666l6.667-3.339Z" fill="#fff"></path>
                    </svg>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($url = get_field('instagram_url', 'options')): ?>
            <li class="instagram"><!-- todo: need instagram svg -->
                <a href="<?= $url; ?>" target="_blank" rel="noreferrer noopener" aria-label="YouTube">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15">
                        <path d="M10.007,15c-2.566,0-4.941-.057-6.353-.154-1.623-.111-2.532-.656-3.037-1.824S.012,10.123,0,7.5C.012,4.874.117,3.129.618,1.973S2.031.264,3.654.153C5.066.057,7.441,0,10.007,0s4.932.057,6.339.153c1.623.111,2.532.657,3.037,1.825s.6,2.9.617,5.522c-.012,2.625-.118,4.371-.618,5.527s-1.413,1.71-3.036,1.82C14.939,14.943,12.569,15,10.007,15ZM7.5,4.167v6.666l6.667-3.339Z" fill="#fff"></path>
                    </svg>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>