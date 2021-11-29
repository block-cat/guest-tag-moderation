import { extend } from 'flarum/common/extend';
import TagDiscussionModal from 'flarum/tags/components/TagDiscussionModal';
import Button from 'flarum/components/Button';
import Stream from 'flarum/utils/Stream';
import { slug } from 'flarum/utils/string';

app.initializers.add('block-cat/guest-tag-moderation', () => {
    // exit if 'flarum-tags' isn't active
    if (!flarum.extensions['flarum-tags']) return;

    extend(TagDiscussionModal.prototype, 'oninit', function () {
        // Contains the name of new tag
        this.newTagName = Stream('');
    });

    extend(TagDiscussionModal.prototype, 'content', function (view) {
        // Return all necesary data for tag creating
        this.newTagData = function() {
            return {
                name: this.newTagName(),
                slug: this.newTagSlug(),
                description: this.newTagDescription(),
                color: this.newTagColor(),
                icon: this.newTagIcon(),
                isHidden: this.newTagIsHidden(),
                primary: this.newTagPrimary(),
            }
        }

        // Creating a new tag with specific name and slug
        // and with another default characteristics
        this.createTag = function() {
            this.newTag = app.store.createRecord('tags');

            this.newTagSlug = Stream(slug(this.newTagName()));
            this.newTagDescription = Stream('');
            this.newTagColor = Stream('');
            this.newTagIcon = Stream('');
            this.newTagIsHidden = Stream(false);
            this.newTagPrimary = Stream(false);

            if (this.newTagName() === '') return;

            this.newTag.save(this.newTagData()).then(
                (tag) => this.tags.push(tag),
                this.newTagName(''),
            );
        }

        // create an input and button for get new tag name from user
        // it seem similarly like input tags field
        let newTagForm =
        <div className="TagDiscussionModal-form">
            <div className="TagDiscussionModal-form-input">
                <div className={'TagsCreate FormControl '}>
                    <input className="FormControl"
                        placeholder={app.translator.trans('block-cat-guest-tag-moderation.forum.create_tag_placeholder')}
                        bidi={this.newTagName}
                        onkeydown={(e) => {
                            if (e.which == 13) {
                                e.preventDefault();
                                this.createTag();
                            }
                        }}
                        />
                </div>
            </div>
            <div className="TagDiscussionModal-form-submit App-primaryControl">
                <Button className="Button Button--primary" icon="fas fa-check" onclick={this.createTag.bind(this)}>
                    {app.translator.trans('block-cat-guest-tag-moderation.forum.create_tag_button')}
                </Button>
            </div>
        </div>;

        // add created field to DOM structure
        try {
            view[0].children.push(newTagForm);
        } catch {}
    });
});
