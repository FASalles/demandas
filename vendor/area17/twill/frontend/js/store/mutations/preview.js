/* Mutations that must trigger a change in the preview in the block editor need to be listed here */
import * as BROWSER from './browser'
import * as FORM from './form'
import * as LANGUAGE from './language'
import * as MEDIA_LIBRARY from './media-library'

const REFRESH_BLOCK_PREVIEW = [
  FORM.UPDATE_FORM_FIELD,
  FORM.REMOVE_FORM_FIELD,
  FORM.ADD_FORM_BLOCK,
  FORM.DELETE_FORM_BLOCK,
  FORM.DUPLICATE_FORM_BLOCK,
  FORM.REORDER_FORM_BLOCKS,
  LANGUAGE.SWITCH_LANG,
  MEDIA_LIBRARY.SET_MEDIA_CROP,
  MEDIA_LIBRARY.SET_MEDIA_METADATAS,
  MEDIA_LIBRARY.SAVE_MEDIAS,
  MEDIA_LIBRARY.DESTROY_MEDIAS,
  MEDIA_LIBRARY.DESTROY_SPECIFIC_MEDIA,
  MEDIA_LIBRARY.REORDER_MEDIAS,
  BROWSER.SAVE_ITEMS,
  BROWSER.DESTROY_ITEMS,
  BROWSER.DESTROY_ITEM,
  BROWSER.REORDER_ITEMS
]

export const REFRESH_BLOCK_PREVIEW_ALL = [
  LANGUAGE.SWITCH_LANG
]

export default {
  REFRESH_BLOCK_PREVIEW,
  REFRESH_BLOCK_PREVIEW_ALL
}
