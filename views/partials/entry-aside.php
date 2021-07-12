<div class="uk-margin extended-groups">
    <h3 class="uk-text-bold uk-flex uk-flex-middle">@lang('Extended Groups')</h3>
    <label class="uk-user"> <i class="icon-Draft uk-icon-user"></i> <strong>@lang('User group'):</strong> <span class="groupname">loading...</span></label>
</div>


<script>
    this.on('mount', function () {
        $this.setGroupView()
    })
    /**
     * just set the current or given group name
     */
    this.setGroupView = function () {
        let group = '{{ $currentUserGroup }}'

        if(window.__collectionEntry.hasOwnProperty('{{ $initial_user_group_attribute_name }}')) {
            group = window.__collectionEntry.{{ $initial_user_group_attribute_name }};
        }
        App.$('.extended-groups .groupname').text(group);
    }
</script>

